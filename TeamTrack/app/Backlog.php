<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backlog extends Model
{
 
    protected $guarded = [];

    
    // Eloquent Relationships 

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function sprints()
    {
        return $this->hasMany('App\Sprint');
    }

}
