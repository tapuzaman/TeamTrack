<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    public $primaryKey = 'id';
    public $timestamp =true;


    // Eloquent Relationships 

    public function sprint()
    {
        return $this->belongsTo('App\Sprint');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
