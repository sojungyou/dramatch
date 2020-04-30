<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drama extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'story' 
    ];
    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function favorite_users()
    {
            return $this->belongsToMany(User::class,'favorites','drama_id','user_id')->withTimestamps();
    }
}