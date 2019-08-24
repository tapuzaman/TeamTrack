<?php
/**
 * 
 * Model Class
 * Social Identity Provider
 * 
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
class SocialProvider extends Model
{
    //making a column of these in the database table
    protected $fillable = ['provider_id','provider'];
    function user(){
        return $this->belongsTo(User::class);
    }
}