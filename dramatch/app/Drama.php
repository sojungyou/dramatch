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
}
