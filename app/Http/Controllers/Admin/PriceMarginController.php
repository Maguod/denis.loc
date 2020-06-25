<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Margin;
use App\Entity\Uploader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceMarginController extends Controller
{
    public function priceWithMargin()
    {
        set_time_limit(240);

       $margins = Margin::all();
       foreach($margins as $margin) {
           $start = $margin->start;
           if (0.01 < ($end = $margin->end) ) {
               $margin = $margin->margin;
               $max = Uploader::whereBetween('price', [$start, $end])->get();
               foreach ($max->chunk(350) as $chunk) {
                   foreach ($chunk as $uploader){
                       $margin_price = $uploader->price + ($uploader->price / 100 * $margin);
                       $uploader->setPublicPrice(round($margin_price, 2));
                   }
               }
           }


       }

        return back();

    }
}
