<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    
    Route::get('/profile', 'AdminController@profile')->name('myprofile');
    Route::get('/edit-profile', 'AdminController@edit')->name('editprofile');
    Route::patch('/edit-profile', 'AdminController@update')->name('updateprofile');
    Route::get('/change-password', 'AdminController@changePassword')->name('changepassword');
    Route::post('/change-password', 'AdminController@updatePassword')->name('updatepassword');    
});

Route::get('/', 'Frontend\PostController@index')->name('post.index');
Route::get('/{post:slug}', 'Frontend\PostController@show')->name('post.show');
Route::get('category/{category:slug}', 'Frontend\CategoryController@show')->name('category.show');
Route::get('/tag/{tag:slug}', 'Frontend\TagController@show')->name('tag.show');




