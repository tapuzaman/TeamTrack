<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
    ];
    

    //Eloquent Relation

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
