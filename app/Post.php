<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id', 'user_id', 'post_title', 'short_description', 'long_description', 'status'];

    public function category()
    {
        return $this->belongsToMany('App\Category');
    }

    public function posts()
    {
        return $this->hasMany('App\CategoryPosts');
    }



}

