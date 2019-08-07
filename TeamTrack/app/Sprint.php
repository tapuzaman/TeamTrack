<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    
    public function backlog()
    {
        return $this->belongsTo('App\Backlog');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

}
