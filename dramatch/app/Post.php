<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');

    public static $rules = array (
        'title' => 'required',
        'body' => 'required',
    );

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function drama(){
        return $this->belongsTo('App\Drama');
    }
    
    public function User(){
        return $this->belongsTo('App\User');
    }
}
