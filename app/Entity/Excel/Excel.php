<?php

namespace App\Entity\Excel;

use Illuminate\Database\Eloquent\Model;

class Excel extends Model
{
    /**
     *@property int $id
     *@property string $file
     *@property string $date
     **/
    public $table = 'excels';
    public $fillable = [
        'uploadIn', 'name', 'id'
    ];

    public function name()
    {
       return $this->name;
    }


}
