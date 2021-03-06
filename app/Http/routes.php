<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['prefix'=>'admin'], function(){ 
    Route::get('/', function () {
        return view('welcome');
    });
});
Route::get('Welcome', 'Welcome@index');
Route::get('salut/{name}', function($name){
    return 'salut '.$name;
});
Route::get('bootstrap', function(){
    return view('vue1'); 
});
Route::get('article/{n}', 'articleController@show')->where('n', '[0-9]+');
Route::get('slug/{slug}-{id}', ['as' => 'slug', function($slug, $id){
   return 'lien:'.route('slug', ['slug' => $slug, 'id' => $id]); 
}])->where('slug', '[aA-zZ0-9\-]+')->where('id', '[0-9]+');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::Controller('welcome', 'Welcome');
Route::get('a-propos', ['as' => 'about', 'uses' => 'PagesController@about']);

Route::group(['middleware' => ['web']], function () {
    //
});
