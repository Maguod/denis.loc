<?php

namespace App\Http\Controllers\Admin;
use App\Entity\Category\Category;
use App\Entity\MainCategoriesCategories;
use App\Entity\Old\OldCategories;
use App\Entity\MainCategory;
use App\Entity\Uploader;
use Illuminate\Http\File;
use App\Entity\Product\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


class CategoriesController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->middleware('can:admin-panel');
        $this->category = $category;
    }

    public function index(Request $request)
    {

        $cats = Category::with('main')->orderBy('id')->paginate(150);

        return view('admin.category.index', compact('cats'));
    }

    public function findNoMain()
    {
        $allCats = Category::with('main')->orderBy('id')->get();
        $cats = collect();
        foreach($allCats as $cat) {
            if($cat->main->isEmpty())
                $cats->push($cat);
        }

        return view('admin.category.main', compact('cats'));

    }
    public function search(Request $request)
    {
        $query = Category::orderBy('id', 'asc');
        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }
        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }
        if (!empty($value = $request->get('in_price'))) {
            $query->where('in_price', 'like', '%' . $value . '%');
        }
        $search = $query->paginate(30);
        $mains = MainCategory::where('active', 'yes')->orderBy('id', 'asc')->get();
        return view('admin.category.search', compact('search', 'mains'));
    }

    public function create()
    {
        $mains = MainCategory::where('active', 'yes')->orderBy('id', 'asc')->get();
        return view('admin.category.create', compact('mains'));
    }

    public function add()
    {
        $catInExc = Uploader::pluck('type')->unique();
        foreach($catInExc as $cat=>$val) {
            if(null === Category::where('in_price', $val)->first()) {
            $parent = substr(stristr($val, '/'), 1);
            Category::store(['in_price' => $val, 'name'=> $parent]);
            }
        }
        return redirect()->back();
     }

//    public function store(Request $request)
//    {
//        $this->validate($request, [
//            'name' => 'required|string|max:255|unique:categories',
//            'parent_id' => 'integer',
//            'main_id' => 'integer',
//        ]);
//
//        Category::create([
//            'name' => $request['name'],
//            'parent_id' => $request['parent_id'] ?? 0,
//            'main_id' => $request['main_id'],
//        ]);
//        return redirect()->route('admin.category.index');
//    }

    public function show($id)
    {
        //
    }

    public function edit($cat)
    {
        $cat = Category::find($cat);
        $selected = $cat->main()->get();
        $mains = MainCategory::where('active', 'yes')->orderBy('id', 'asc')->get();
        return view('admin.category.edit', compact('cat', 'mains', 'selected'));
    }

    public function update(Request $request, $id, Category $cat)
    {
       $data =  $this->validate($request, [
            'name' => [
                'string',
                'max:255',
                Rule::unique('categories')->ignore($id),
            ],
           'main_id' => 'integer|nullable',
        ]);

       if($data) {
           $cat->find($id)->update($data);
           MainCategoriesCategories::create([
               'main_category_id' => $data['main_id'],
               'category_id' => $id
           ]);
       }
       return redirect()->back();
    }

//    public function main(Request $request, $id)
//    {
//    $data = $this->validate($request, [
//        'main_id' => 'integer'
//    ]);
//
//            $cat = Category::where('id', $id)->first();
//            $cat->update($data);
//
//        return redirect()->route('admin.category.index');
//    }

    public function createOldCategories() /*создаю базу старых категории*/
    {
        $categories = Category::all();
        foreach($categories as $cat) {
            if(!(OldCategories::where('name', $cat->name)->exists()) )
            OldCategories::create([
              'name' => $cat->name,
              'parent_id' => $cat->parent_id,
              'main_id' => $cat->main_id,
              'slug' => $cat->slug,
              'in_price' => $cat->in_price,
            ]);
        }
        return redirect()->route('admin.category.index');
    }

    public function createMainToCategories() /*создаю промежуточную базу для belongsToMany*/
    {
       $cats = Category::all();
       foreach($cats as $item) {
           DB::insert('insert into main_categories_categories (main_category_id, category_id ) values (?, ?)', [$item->main_id, $item->id]);
       }
       return redirect()->back();
    }

    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();
    }
}
