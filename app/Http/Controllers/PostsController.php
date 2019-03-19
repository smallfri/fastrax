<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryPosts;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function listByCategory($category_id)
    {
        $posts = Post::join('category_post', 'post_id', '=', 'posts.id')
            ->where('category_id', $category_id)
            ->orderBy('posts.created_at', 'DESC')
            ->paginate(5);

        $cat_name = Category::getPostCategoryName($category_id);

        return view('layouts.posts.category', compact('posts', 'cat_name'));

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status','active')->get();

        return view('layouts.posts.index', ['posts' => $posts]);
    }

    public function view($post_id)
    {
        $posts = Post::find($post_id);

        return view('layouts.posts.view', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::getCategorySelect();

        return view('layouts.posts.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_title' => 'required|max:255',
            'category_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);

        $attributes = $request->all();

        $Category = $attributes['category_id'];

        unset($attributes['category_id']);

        $attributes['status'] = 1; //unpublished

        $post = Post::create($attributes);

        //handle Category
        $post->Category()->sync($Category);

        return back()->with('success', 'Post Added!');
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $posts = Post::where('status',1)->with('Category')->get();

        return view('layouts.posts.index', ['posts' => $posts]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $CategorySelected = $post->Category;

        $Category = Category::getCategorySelect();
        return view('layouts.posts.edit', ['Category' => $Category, 'post'=>$post, 'CategorySelected'=>$CategorySelected]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'post_title' => 'required|max:255',
            'category_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);

        $attributes = $request->all();

        $Category = $attributes['category_id'];

        unset($attributes['category_id']);

        $attributes['status'] = 0; //unpublished

        $post = Post::find($id);

        $post->update($attributes);

        //handle Category
        $post->Category()->sync($Category);

        return back()->with('success', 'Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return back()->with('success', 'Post Deleted!');
    }
}
