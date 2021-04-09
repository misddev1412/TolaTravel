<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class GiftDaily extends Model
{

    protected $table = 'gift_daily';
    protected $fillable = ['user_id', 'date', 'toin'];
}