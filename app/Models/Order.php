<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'address_id',
        'phone',
        'orderdate',
    ];


    public function address(){
        return $this->belongsTo('App\Models\Address');
    }
    public function orderproduct(){
        return $this->hasMany('App\Models\OrderProduct');
    }

    public static function getId($model, $table, $value) {
        return $model::where($table, $value)->first()->id;
    }
}