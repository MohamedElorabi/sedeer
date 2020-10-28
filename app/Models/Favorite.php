<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $table = 'favorites';


    public $fillable = [
        'user_id',
        'butcher_id'
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
