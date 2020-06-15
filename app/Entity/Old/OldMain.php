<?php

namespace App\Entity\Old;

use Illuminate\Database\Eloquent\Model;

class OldMain extends Model
{
    protected $table = 'old_main_categories';
    protected $fillable = [
        'name', 'slug', 'image', 'parent_id', 'active'
    ];
}
