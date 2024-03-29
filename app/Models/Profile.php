<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{

    protected $fillable = [
        'user_id',
        'image',
        'birthday',
        'gender',
    ]; 
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
