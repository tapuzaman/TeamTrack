<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function leader(){
        return $this->hasOne('App\Leader');
    }

}
