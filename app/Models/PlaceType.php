<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Model;

class PlaceType extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name'];

    protected $table = 'place_types';

    protected $fillable = [
        'category_id', 'status'
    ];

    protected $hidden = [];

    protected $casts = [
        'category_id' => 'integer'
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVE = 0;

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function getListAll()
    {
        $place_types = self::query()
            ->orderBy('created_at', 'desc')
            ->get();
        return $place_types;
    }

    public function getListByCat($cat_id)
    {
        $place_types = self::query()
            ->with('category')
            ->orderBy('created_at', 'desc');

        if ($cat_id)
            $place_types->where('category_id', $cat_id);

        $place_types = $place_types->get();

        return $place_types;
    }
}