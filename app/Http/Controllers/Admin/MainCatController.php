<?php

namespace App\Http\Controllers\Admin;

use App\Entity\MainCategory;
use App\UseCases\Entity\Main\MainCategoriesService;
use App\UseCases\FileUploader\FileUploader;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\ImageController;
use Illuminate\Support\Str;
use App\Entity\Old\OldMain;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;


class MainCatController extends Controller
{
    private $mainCategory;
    private $loader;
    public $service;
    public function __construct(MainCategory $mainCategory, ImageController $loader)
    {
        $this->middleware('can:admin-panel');
        $this->mainCategory = $mainCategory;
        $this->loader = $loader;

    }

    public function index(Request $request)
    {
        $query = MainCategory::orderBy('parent_id');
        if (!empty($value = $request->get('name'))) {
            /*Прописать сортировку по наличии строки в запросе*/
            $query->where('name', 'like', '%' . $value . '%');
        }
        if (!empty($value = $request->get('id'))) {
            /*Прописать сортировку по наличии строки в запросе*/
            $query->where('name', 'like', '%' . $value . '%');
        }
        $main = $query->with('parent')->with('categories')->paginate(100);
        return view('admin.main.index', compact('main'));
    }


    public function create()
    {
        $cats = MainCategory::all();
        return view('admin.main.create', compact('cats'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data =  $this->validate($request, [
            'name' => 'required|string|max:255|unique:main_categories',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg+xml',
            'parent_id' => 'nullable',
        ]);
        if(false === $data) {
            return redirect()->back()->with('info', 'Что то с валидацией');
        }
        if($request['image']) {
//            $file = Storage::putFile('upload/main', new File($request->file('image')));
            $file = Image::make($request->file('image'))->resize(300, 200);
            dd($file);
        }


        $main = MainCategory::add($data);
        return redirect()->route('admin.main.index');
    }


    public function show($id)
    {
        $main = $this->mainCategory->where('id', $id)->first();

        $childs = $main ? $main->children : null;
        $this->service = new MainCategoriesService($main);
        return view('admin.main.show', compact('main','childs'));
    }


    public function edit(MainCategory $main)
    {
        $all = $main::all();
        return view('admin.main.edit', compact('main', 'all'));
    }

    public function update(Request $request, MainCategory $main)
    {

        $data = $this->validate($request, [
            'name' => [
                'string',
                'max:255',
                Rule::unique('main_categories')->ignore($main->id),
            ],
            'file' => 'nullable|image|mimes:jpg,jpeg,png',
            'parent_id' => 'nullable|integer',
        ]);

        if (isset($data['file']) && null !== $data['file'] ) {
            Storage::delete('/upload/main/'.$main->image);
            $extension = $request->file('file')->extension();
           $file = Image::make($request->file('file'))
               ->resize(184, 120)
               ->save('upload/main/'.uniqid ().'.'.$extension.'');
//           dd($file, $request->file('file'));
            $data['image'] = $file->basename;
        }
        $main->update($data);
        return redirect()->route('admin.main.index');
    }

    public function toggleActivate(Request $request, $id)
    {
        $main = MainCategory::find($id);
        if ($main->isActive()) {
            $main->deActive();
        } else {
            $main->active();
        }
        return redirect()->back();
    }

    public function createOldMains()
    {

        $mains = MainCategory::all();
        foreach($mains as $main) {
            if(!(OldMain::where('name', $main->name)->exists()) )
                OldMain::create([
                    'name' => $main->name,
                    'slug' => $main->slug,
                    'parent_id' => $main->parent_id,
                    'active' => $main->active,
                ]);
        }
        return redirect()->route('admin.main.index');
    }

    public function destroy( MainCategory $main)
    {
        dd('111');
        //дописать удаление картинки
        Storage::delete('/upload/main/'.$main->image);
        $main->delete();
        return redirect()->route('admin.main.index');
    }
}
