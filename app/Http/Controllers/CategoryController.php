<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $Category = Category::all();
//
//        return view('layouts.posts.index', ['Category' => $Category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::getCategorySelect($prepend=true);
        return view('layouts.category.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:category|max:255',
            'parent_id' => 'required',
        ]);

        $attributes = $request->all();

        Category::create($attributes);

        return back()->with('success', 'Category Added!');
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $Category = Category::all();

        return view('layouts.category.index', ['Category' => $Category]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('layouts.category.edit', ['category' => $category, 'Category' => Category::getCategorySelect()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parent = Category::find($request->get('parent_id'));

        $node = Category::find($id);
        $node->category_name = $request->get('category_name');
        $node->parent_id = $request->get('parent_id');

        if ($request->get('parent_id') == 0) {
            //save as root
            $node->saveAsRoot();
        } else {
            //save as child
            $node->appendToNode($parent)->save();
        }

        return back()->with('success', 'Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $node = Category::find($id);
        $node->delete();

        return back()->with('success', 'Category Deleted!');
    }
}
