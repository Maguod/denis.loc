<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Excel\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;



class ExcelController extends Controller
{
    private $excel;
    public function __construct(Excel $excel)
    {
        $this->middleware('can:admin-panel');
        $this->excel = $excel;
    }
    public function index()
    {
        $excel = Excel::orderBy('created_at', 'desc')->get();

        return view('admin.excel.index', ['excel' => $excel]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if(empty($request->file())){return redirect()->back();}
        $file = Storage::putFile('excel', $request->file('file'));
        if($file) {
            $name = substr($file, 6);
            $this->excel::create([
                'id' => rand(0,1999),
                'uploadIn' => $file,
                'name' => $name,
            ]);
            return redirect()->back()->with('success', 'фаил загружен в '.$file);
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request, Excel $excel)
    {
        Storage::delete($excel->uploadIn);
        $excel->delete();
        return redirect()->route('admin.excel.index');
    }
}
