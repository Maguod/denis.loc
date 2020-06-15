<?php

namespace App\Http\Controllers;

use App\UseCases\Entity\Main\MainCategoriesService;
use App\Entity\Category\Category;
use App\Entity\MainCategoriesCategories;
use App\Entity\MainCategory;
use App\Entity\Product\Product;
use App\Entity\Uploader;
use Illuminate\Http\Request;

class MainsController extends Controller
{
    private $service;
    public function __construct(MainCategoriesService $service)
    {
        $this->service = $service;
    }

    public function index()
    {

        $mains = MainCategory::where('parent_id', null)->orderBy('name', 'asc')->paginate(42);

        return view('public.main.index', compact('mains'));

    }
    public function show($slug)
    {
        $main = MainCategory::where(['slug' => $slug])->with('categories')->first();
        $catsName = [];
        $products = [];

            foreach($this->service->getCategoryForMain($main) as $item) {
                $catsName[] = $item->in_price;
            }

           $products = Uploader::whereIn('type', $catsName)->paginate(150);

        return view('public.main.show', compact('main', 'products'));
    }

}
