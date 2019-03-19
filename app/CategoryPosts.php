<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Kalnoy\Nestedset\NodeTrait;

class CategoryPosts extends Model
{
    protected $fillable = ['category_id', 'post_id'];

    public function posts()
    {
        return $this->hasMany('App\Post', 'post_id', 'posts_id');
    }
}
