<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/category', 'CategoriesController@create');
Route::post('/category', 'CategoriesController@store');
Route::get('/category/{id}', 'CategoriesController@edit');
Route::post('/category/{id}', 'CategoriesController@update');
Route::get('/category/{id}/delete', 'CategoriesController@destroy');


Route::get('/posts/{category_id}/list', 'PostsController@listByCategory');
Route::get('/posts/list', 'PostsController@list');
Route::get('/posts', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{id}/edit', 'PostsController@edit');
Route::post('/posts/{id}/edit', 'PostsController@update');
Route::get('/posts/{id}', 'PostsController@view');
Route::get('/posts/{id}/delete', 'PostsController@destroy');
