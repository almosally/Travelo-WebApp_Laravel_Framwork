<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table name be default posts
    // we dont really need this one now but just to have it
    protected $table ='posts';
    //primary key in db by default
    protected $primaryKey ='id';
    //timestamps
    public $timestamps=true; //is true by default

    //relationships
    public function user(){
       return $this->belongsTo('App\User');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }
}
//Post::all();