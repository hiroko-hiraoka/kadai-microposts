<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id'];
    
    public function user()
    {
        return $this->belongsto(User::class);
    }
                
    public function favorite_user()
    {
        return $this->belongsToMany(User::class, 'favorites', 'Micropost_id', 'user_id')->withTimestamps();
    }

    
}
