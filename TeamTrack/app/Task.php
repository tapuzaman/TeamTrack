<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    public $primaryKey = 'id';
    public $timestamp =true;

    public function sprint()
    {
        return $this->belongsTo('App\Sprint');
    }

}
