<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;

    protected $fillable = ['category_name', 'parent_id'];
    protected $table = 'category';

    public static function getCategorySelect($prepend = false)
    {
        if ($prepend) {
            return Category::pluck('category_name', 'id')->prepend('This is a Parent Category');
        } else {
            return Category::pluck('category_name', 'id');
        }
    }

    public static function getPostCategoryName($id)
    {
        $category = Category::find($id);

        return $category->category_name;
    }

//    public function posts()
//    {
//        return $this->belongsToMany('App\Category', 'category');
//    }
}
