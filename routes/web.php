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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth','prefix'=> 'post'],function(){
    Route::get('get_all', 'PostController@getAllPosts');
    Route::post('create_post', 'PostController@createPost');
    Route::get('{id}', 'PostController@getPost');
});
