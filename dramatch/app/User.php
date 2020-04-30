<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favorites()
    {
        return $this->belongsToMany(Drama::class, 'favorites', 'user_id', 'drama_id')->withTimestamps();
    }
    public function favorite($drama_id)
    {
        $exist = $this->is_favorite($drama_id);

        if($exist){
            return false;
        }else{
            $this->favorites()->attach($drama_id);
            return true;
        }
    }
    public function unfavorite($drama_id)
    {
        $exist = $this->is_favorite($drama_id);

        if($exist){
            $this->favorites()->detach($drama_id);
            return true;
        }else{
            return false;
        }
    }
    public function is_favorite($drama_id)
    {
        return $this->favorites()->where('drama_id',$drama_id)->exists();
    }

}
