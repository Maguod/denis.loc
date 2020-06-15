<?php

namespace App\Entity;

use App\Entity\Category\Category;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'slug', 'image', 'parent_id', 'active'
    ];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public const STATUS_WAIT = 'no';
    public const STATUS_ACTIVE = 'yes';

    public function categories()
    {
       return $this->belongsToMany(
           Category::class,
           'main_categories_categories',
           'main_category_id',
           'category_id');

    }
    public function children()
    {
       return $this->hasMany(static::class, 'parent_id', 'id')->orderBy('name', 'asc');
    }

    public function childrenActive()
    {
       return $this->hasMany(static::class, 'parent_id', 'id')->where('active', 'yes')->orderBy('name', 'asc');
    }

    public function parent()
    {
       return $this->hasOne(static::class, 'id', 'parent_id');
    }

    public static function new($name, $image, $parent_id = null): self
    {
        return static::create([
            'name' => $name,
            'image' => $image,
            'main_id' => $parent_id,
        ]);
    }

    public static function add($data)
    {
        $main = new static();
        $main->fill($data);
        $main->save();
        return $main;
    }
    public function isWait(): bool
    {
        return $this->active === self::STATUS_WAIT;
    }

    public function isActive(): bool
    {
        return $this->active === self::STATUS_ACTIVE;
    }

    public function deActive()
    {
        $this->active = self::STATUS_WAIT;
        $this->save();
    }
    public function active()
    {
        $this->active = self::STATUS_ACTIVE;
        $this->save();
    }

}
