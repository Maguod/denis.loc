<?php

namespace App\Http\Controllers;

use App\Entity\Category\Category;
use App\Entity\Product\Product;
use App\Entity\Uploader;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {

        $cats = Category::orderBy('name', 'asc')->paginate(42);

        return view('public.category.index', compact('cats'));

    }
    public function show($slug)
    {
        $cat = Category::where(['slug' => $slug])->first();
        $products = Uploader::where(['type' => $cat->in_price])->orderBy('is_active', 'desc')->paginate(80);
        return view('public.category.show', compact('cat', 'products'));
    }
}
