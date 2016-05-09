<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
    //return view('homepage');
Route::get('/', 'HomeController@index');
//});

Route::resource('home', 'HomeController');
// Route::resource('home', 'HomeController', ['parameters' => [
//     'home' => 'admin_user'
// ]]);
Route::resource('user_login', 'UserLoginController');
Route::resource('about_us', 'AboutController');
Route::resource('contact', 'ContactController');
Route::get('bookmark/listing/{id}', 'BookmarkController@listing');
Route::get('bookmark/delete/{id}','BookmarkController@delete');
Route::resource('bookmark', 'BookmarkController');


Route::auth();

// Route::get('/home', 'HomeController@index');
