<?php

namespace App\Entity;

use App\Entity\Category\Category;
use App\Entity\Product\Product;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use Sluggable;
    protected $fillable = [
        'name', 'slug'
    ];

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }


    public static function store(array $data)
    {
        $seller = new static();
        $seller->create([
            'name' => $data['name']
        ]);

        return $seller;
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
