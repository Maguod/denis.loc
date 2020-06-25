<?php

namespace App\Jobs;

use App\Entity\Uploader;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UploadsPriceUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $data;

    public function __construct( array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $activeItem = [];
        foreach ($this->data as $key=>$item) {
            $up = Uploader::where([
                ['code' , $item['code']],
                ['seller' , $item['seller']],
                ['note' , $item['note']]
            ])->first();

            if(null === $up) {
                Uploader::store($item);
                continue;
            }elseif ((int) $up->price === (int) $item['price']){

                $activeItem[]= $up->id;
                continue;
            }elseif((int) $up->price !== (int) $item['price']){
                $up->editPrice(['price' => $item['price']]);
                continue;
            }
            continue;
        }
        Uploader::whereIn('id', $activeItem)
            ->update(['is_active' => 'yes']);


        //         $prods = Uploader::orderBy('seller','asc')->get(['id', 'seller','type','code','price','note'])->toArray();

//         $activeItem = [];
//         $updatePrice = [];
//         $store = [];

//         foreach ($this->data as $key=>$item){

//             foreach($prods as $keyP=>$prod) {
// //                dd($keyP, count($prods));
//                 if((string) $item['code'] === (string) $prod['code'] && (string) $item['note'] ===(string) $prod['note'] && (string) $item['seller'] === (string) $prod['seller'] ) {
//                     if((int) $item['price'] === (int) $prod['price']) {
//                         $activeItem[] = $prod['id'];
// //                        unset($prods[$key]);
//                         break(1);
//                     }elseif((int) $item['price'] !== (int) $prod['price']) {
//                         $updatePrice[$prod['id']] = $item['price'];
// //                        unset($prods[$key]);
//                         break(1);
//                     }else {
//                         throw new \Exception('Что то пошло не так. В цикле $item попал в else.');
//                     }
//                 }

// //                dd(($keyP - 1), count($prods));
//                 if( 1+ $keyP === count($prods)) {
//                     $store[] = $item;
//                 }
//             }

//         }
// unset($prods);

//         if(count($activeItem) > 0) {
//             Uploader::whereIn('id', $activeItem)->update(array('is_active' => 'yes'));
//         }
// unset($activeItem);
//         if(count($updatePrice) > 0) {
//             foreach($updatePrice as $key=>$val) {
//                 Uploader::where('id', $key)->update(array('price' => $val, 'is_active' => 'yes' ));
//             }

//         }
// unset($updatePrice);
//         if(count($store) > 0) {
//             foreach($store as $new) {
//                 Uploader::store($new);
//             }
//         }


//     }
        // OLD CODE
    }
}

