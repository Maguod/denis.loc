<?php

namespace App\Entity\Old;

use Illuminate\Database\Eloquent\Model;

class OldCategories extends Model
{
    protected $table = 'old_categories';
    protected $fillable = [
        'name', 'parent_id', 'main_id', 'slug', 'in_price'
    ];
}
