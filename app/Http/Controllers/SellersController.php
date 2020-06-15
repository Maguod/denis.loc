<?php

namespace App\Http\Controllers;
use App\Entity\Uploader;
use App\Entity\Seller;

class SellersController extends Controller
{

    public function index()
    {

        $sellers = Seller::orderBy('name', 'asc')->paginate(42);

        return view('public.seller.index', compact('sellers'));

    }
    public function show($slug)
    {

        $seller = Seller::where(['slug' => $slug])->first();

        $products = Uploader::where(['seller' => $seller->name])->orderBy('is_active', 'desc')->paginate(50);

        return view('public.seller.show', compact('seller', 'products'));
    }
}
