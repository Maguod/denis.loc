<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class MainCategoriesCategories extends Model
{

    protected $fillable = ['main_category_id', 'category_id'];
    protected $table = 'main_categories_categories';
}
