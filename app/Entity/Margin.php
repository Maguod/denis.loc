<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Margin extends Model
{
    protected $fillable  = ['id', 'start', 'end','margin'];

    protected $table = 'margins';

//    public function getRouteKeyName()
//    {
//        return 'id';
//    }
}
