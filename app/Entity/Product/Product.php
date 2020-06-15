<?php

namespace App\Entity\Product;


use App\Entity\Category\Category;
use App\Entity\Seller;
use App\Entity\Uploader;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    /**
     *@property int $id
     *@property string $code
     *@property string $type
     *@property string $seller
     *@property string $category
     *@property string $cat_id
     **/


    protected $fillable = [
        'code'
    ];

    public const STATUS_WAIT = 'no';
    public const STATUS_ACTIVE = 'yes';

    public static function store(array $data)
    {
        if (empty($data)){return;}
        $product = new static();
        $product->fill($data);
        $product->save();
    }

}
