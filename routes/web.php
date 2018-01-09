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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('threads' , 'ThreadsController@index')->name('threads.index');
Route::get('threads/create' , 'ThreadsController@create')->name('threads.create');

//Route::get('threads/{thread}/' , 'ThreadsController@show');
Route::get('threads/{channel}' , 'ThreadsController@index');
Route::get('threads/{channel}/{thread}/' , 'ThreadsController@show');
Route::post('threads' , 'ThreadsController@store')->name('threads.store');
//instead of all route of /threads applies resource
//Route::resource('/threads', 'ThreadsController');
//Route::post('/threads/{thread}/replies' , 'RepliesController@store');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');
//Route::get('/threads/{channel}/{thread}/replies', 'RepliesController@store');
