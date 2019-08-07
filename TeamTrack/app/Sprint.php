<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    
    public function backlog()
    {
        return $this->belongsTo('App\Backlog');
    }

}
