<?php

use App\Entity\MainCategory;

if (! function_exists('productPrice')) {

    function productPrice($price)
    {
        if ($price < 3) {
            return round($price * 2, 2);
        }
        if ($price <= 10) {
            return round($price * 1.5, 2);
        }
        if ($price <= 50) {
            return round($price * 1.25, 2);
        }
        if ($price > 50) {
            return round($price * 1.13, 2);
        }
    }
}
if (! function_exists('tycoPrice')) {

    function tycoPrice($price)
    {
        if ($price <= 3.99) {
            return round($price * 3, 2);
        }
        if ($price <= 15) {
            return round($price * 2, 2);
        }
        if ($price <= 25) {
            return round($price * 1.5, 2);
        }
        if ($price <= 55) {
            return round($price * 1.25, 2);
        }
        if ($price <= 100) {
            return round($price * 1.15, 2);
        }
        if ($price > 100) {
            return round($price * 1.13, 2);
        }
    }
}
if (! function_exists('findArrayinMass')) {

    function findArrayinMass(array $arr, array $uploads)
    {
       foreach($uploads as $upload) {

          if($upload['code'] === $arr['code']
              && $upload['seller'] === $arr['seller']
              && $upload['note'] === $arr['note']
              && $upload['price'] !== $arr['price'] ) {
                  return  $upload['id'];
          }

//          continue;
       }


    }
    if (! function_exists('mainList')) {

        function mainList()
        {
            return MainCategory::where('parent_id', null)->get();

        }
    }
}


