<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;





class Address extends Model
{

    protected $fillable = [
        'country',
        'user_id',
        'postalcode',
        'region',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }
}