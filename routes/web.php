<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Admin
Route::get('admin', 'AdminController')->name('admin');

//users
Route::get('user/list/{role?}', 'UserController@index');
Route::get('user/blog-report', 'UserController@blogReport')->name('user.blog.report');
Route::resource('user', 'UserController', ['except' => 'index']);
Route::put('userseen/{user}', 'UserAjaxController@updateSeen');

//roles
Route::get('roles', 'RoleController@index');
Route::post('roles', 'RoleController@update');

//blog
Route::get('blog/order', 'BlogController@indexOrder')->name('blog.order');