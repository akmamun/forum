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
use App\Jobs\SendEmailJob;
use App\User;
use App\Notifications\TaskCompleted;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('threads' , 'ThreadsController@index')->name('threads.index');

//Route::get('threads/search/{searchkey}' , 'ThreadsController@search')->name('threads.search');
//scout#searching

Route::get('threads/create' , 'ThreadsController@create')->name('threads.create');

Route::get('threads/{channel}' , 'ThreadsController@index');
Route::get('threads/{channel}/{thread}/' , 'ThreadsController@show');
Route::post('threads' , 'ThreadsController@store')->name('threads.store');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');

Route::get('sendemail',function()
{
    SendEmailJob::dispatch()
        ->delay(now()->addSecond(2));
   return "send ";

});

Route::get('/', function () {
    $when = now()->addSecond(5);

        User::find(1)->notify((new TaskCompleted())->delay($when));

});

