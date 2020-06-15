<?php
/**
 * Created by PhpStorm.
 * User: Maxim
 * Date: 12.06.2019
 * Time: 13:11
 */

namespace App\UseCases\DbCases\Products;


use App\Entity\Product\Product;

class ProductActions
{
//    private $product;
//    public function __construct(Product $product)
//    {
//        $this->product = $product;
//    }

    public function deActivateProduts($count)
    {
        $count = (int)$count;
        if(Product::where('id', $count+1)->get()->isNotEmpty()){
            Product::where('id', '>', $count)
                ->update(['active' => 'no']);
        }

    }
}