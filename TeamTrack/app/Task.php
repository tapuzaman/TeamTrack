<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    public $primaryKey = 'id';
    public $timestamp =true;

    protected $guarded = [];


    // Functions

    public static function createTask($sprint_id, $assigned_to, $created_by, $title, $description)
    {
        $newTask = Task::create([
            'sprint_id' => $sprint_id,
            'user_id' => $assigned_to, // TODO: change user_id to assigned_id in DB and update relation ? 
            'created_by' => $created_by,
            'title' => $title,
            'description' => $description,
            'due_date' => '2020-08-12 00:00:00',
            'is_completed' => false
           
        ]);
    }


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
