<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    //a post has a relashionship with a user
    public function user(){
        return $this->belongsTo('App\User');
    }
    //this allow the user to filter the type of event
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
