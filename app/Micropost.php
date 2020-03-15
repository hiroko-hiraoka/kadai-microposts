<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = [
        'content', 'user_id', 'maker', 'title', 'field', 'class', 'standard_a', 'standard_b','image_path'
    ];
    
    public function user()
    {
        return $this->belongsto(User::class);
    }
                
    public function favorite_user()
    {
        return $this->belongsToMany(User::class, 'favorites', 'Micropost_id', 'user_id')->withTimestamps();
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
