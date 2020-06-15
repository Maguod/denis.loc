<?php

namespace App\Entity\Category;


use App\Entity\MainCategory;
use App\Entity\Uploader;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;



class Category extends Model
{
    use Sluggable;

    protected $table = 'categories';
    protected $fillable = [
        'name', 'parent_id', 'slug', 'in_price'
    ];
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function main()
    {
      return  $this->belongsToMany(
          MainCategory::class,
          'main_categories_categories',
          'category_id',
          'main_category_id'
          )->where('active', 'yes');
    }

    public function price()
    {
        return $this->hasMany(Uploader::class, 'type', 'in_price');
    }

    public static function store(array $data)  /* 2 видео, 44 минута заполнение полей фэйкером
  у него parent_id=null  И 50-51 минута внимательно посмотри его контроллер!!! */
    {
      $cat = new static();
      // $data['id'] = DB::table('categories')->count() + 1;
      $cat->fill($data);
      $cat->save();

      return $cat;

    }
    public static function add(array $data)  /* 2 видео, 44 минута заполнение полей фэйкером
  у него parent_id=null  И 50-51 минута внимательно посмотри его контроллер!!! */
    {
        $cat = new static();
        $cat->fill([
            'name' => $data['name'],
            'parent_id' => $data['parent_id'],
            'in_price'=> $data['in_price'],
        ]);
        $cat->save();
        return $cat;
    }
    
    public function edit(array $data)
    {
      $this->fill($data);
      $this->save();
    }


    public function remove()
    {
        $this->delete();
    }
}
