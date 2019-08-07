<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leader extends User
{
    
    protected $table = 'users';

    
    // Eloquent Relationships 

    public function teams()
    {
        return $this->hasMany('App\Team','leader_id');
    }

}
