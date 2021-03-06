<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abuse extends Model
{
    protected $table = 'abuses';

    public $timestamp = true;

    protected $fillable = [
        'id',
        'content',
        'user_id',
        'shop_user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function shopProduct()
    {
        return $this->belongsTo('App\ShopProduct');
    }
}
