<?php

namespace App\Http\Controllers\Admin;


use App\Entity\Seller;
use App\Entity\Uploader;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{

    public function index(Request $request)
    {

        $query = Seller::orderBy('id', 'asc');

        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }
        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value. '%' );
        }

        $sellers = $query->paginate(80);

        return view('admin.seller.index', compact('sellers'));
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')) {

            $sellers = Uploader::pluck('seller')->unique();

            $sellers->map(function($item, $val) {

                if(null === Seller::where(['name' => $item])->first())

                Seller::store(['name' => $item]);
            });

        }
        return redirect()->back();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        $seller = Seller::find($id);

        return view('admin.seller.edit', compact('seller'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name' => 'required|string|max:255|unique:main_categories',
            'file' => 'image|mimes:jpg,jpeg,png',
        ]);

        $file = Storage::putFile('upload/seller', new File($request->file('file')));

        $seller = Seller::find($id);
        dd($file,$seller);
        $seller->update([
            'name' => $data['name'],
            'image' => $file,
        ]);

        return redirect()->route('admin.seller.index');
    }


    public function destroy($id)
    {
        $seller = Seller::find($id);
        $seller->delete();
    }
}
