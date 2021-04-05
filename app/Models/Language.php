<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

    protected $casts = [
        'is_default' => 'integer',
        'is_active' => 'integer'
    ];

    const STATUS_DEACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const IS_DEFAULT = 1;
}