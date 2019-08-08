<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
        'currentTeamId'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
