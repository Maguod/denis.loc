<?php

namespace App\Entity;

use App\Entity\Category\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Uploader extends Model
{

    /**
     *@property int $id
     *@property string $code
     *@property string $type
     *@property string $seller
     *@property string $is_active
     *@property string $note
     *@property string $price
     *@property string $margin_price
     *@property string $description
     *@property string $image_link
     *@property string $meta_search
     **/

    use Sluggable;

    protected $fillable = ['id','seller', 'type','code', 'slug','price','note', 'is_active', 'margin_price','description','image_link','meta_search'];
    protected $table = 'uploader';

    public const STATUS_WAIT = 'no';
    public const STATUS_ACTIVE = 'yes';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['code']
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'type', 'in_price');
    }


    public static function store(array $data)
    {
        if (empty($data)){return;}
        $uploader = new static();
        $uploader->fill($data);
        $uploader->save();

    }
    public function edit(array $data)
    {
        $data['is_active'] = 'yes';
        $this->fill($data);
        $this->save();

    }
    public function editPrice(array $data)
    {
        $this->fill([
            'price' => $data['price'],
            'is_active' => 'yes'
        ]);
        $this->save();

    }

    public function isWait(): bool
    {
        return $this->is_active === self::STATUS_WAIT;
    }

    public function isActive(): bool
    {
        return $this->is_active === self::STATUS_ACTIVE;
    }

    public function deActive()
    {
        $this->is_active = self::STATUS_WAIT;
        $this->save();
    }
    public function activeUp()
    {
        $this->is_active = self::STATUS_ACTIVE;
        $this->save();
    }

    public function toggleStatus()
    {
       if($this->isWait()) {
           $this->active();
       } else {
           $this->deActive();
       }
    }
    public  function getPublicPrice()
    {
        return $this->margin_price;
    }
    public  function setPublicPrice(float $price)
    {
        $this->margin_price = $price;
        $this->save();
    }
}
