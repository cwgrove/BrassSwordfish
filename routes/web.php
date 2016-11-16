<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});


Auth::routes();

Route::get('/home', 'HomeController@index');

//Displays all posts
Route::get('/', 'PostsController@index');

//Displays all videos
Route::get('/video', 'PostsController@video');

//Displays all posts
Route::get('/post', 'PostsController@post');

//Takes user to admin pannel
Route::get('/share', 'PostsController@admin')->middleware('auth');

//Shows individual post
Route::get('/{id}', 'PostsController@show');

//Add post form
Route::get('/share/add', 'PostsController@create')->middleware('auth');

//Store post
Route::post('/share/add', 'PostsController@store')->middleware('auth');

//Shows edit post form`
Route::get('/share/edit/{id}', 'PostsController@edit')->middleware('auth');

// Updates post form
Route::post('/share/edit/{id}', 'PostsController@update')->middleware('auth');

//***will Displays all posts owned by user
Route::get('/share/posts', 'PostsController@allposts');

//Will archive post

Route::get('/share/edit/{id}/delete', 'PostsController@archive')->middleware('auth');
