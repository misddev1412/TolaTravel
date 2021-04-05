<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements TranslatableContract
{
    use Translatable, HasJsonRelationships {
        Translatable::getAttribute insteadof HasJsonRelationships;
    }

    protected $casts = [
        'category' => 'json',
        'user_id' => 'integer',
        'status' => 'integer',
    ];

    public $translatedAttributes = ['title', 'content'];

    protected $table = 'posts';

    protected $fillable = ['user_id', 'category', 'content', 'slug', 'thumb', 'type', 'status', 'seo_title', 'seo_description'];

    protected $hidden = [];

    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVE = 0;
    const TYPE_BLOG = "blog";
    const TYPE_PAGE = "page";

    public function categories()
    {
        return $this->belongsToJson(Category::class, 'category');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}