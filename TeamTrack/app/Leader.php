<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leader extends User
{
    protected $guarded = [];

    public function team(){
        return $this->belongsTo('App\Team');
    }
}
