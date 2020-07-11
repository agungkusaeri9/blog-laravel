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
Route::get('/', 'HomeController@index')->name('homepage');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile', 'AdminController@profile')->name('myprofile');
    Route::get('/edit-profile', 'AdminController@edit')->name('editprofile');
    Route::patch('/edit-profile', 'AdminController@update')->name('updateprofile');
    Route::get('/change-password', 'AdminController@changePassword')->name('changepassword');
    Route::post('/change-password', 'AdminController@updatePassword')->name('updatepassword');

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::post('/create', 'CategoryController@store')->name('category.store');
        Route::get('/{category:slug}/edit', 'CategoryController@edit')->name('category.edit');
        Route::patch('/{category:slug}/edit', 'CategoryController@update')->name('category.update');
        Route::delete('/{category:slug}', 'CategoryController@destroy')->name('category.destroy');
    });
    Route::group(['prefix' => 'post'], function () {
        Route::get('/', 'PostController@index')->name('post.index');
        Route::get('/create', 'PostController@create')->name('post.create');
        Route::post('/create', 'PostController@store')->name('post.store');
        Route::get('/{post:slug}', 'PostController@show')->name('post.show');
        Route::get('/{post:slug}/edit', 'PostController@edit')->name('post.edit');
        Route::patch('/{post:slug}/edit', 'PostController@update')->name('post.update');
        Route::delete('/{post:slug}', 'PostController@destroy')->name('post.destroy');
    });
    Route::group(['prefix' => 'tag'], function () {
        Route::get('/', 'TagController@index')->name('tag.index');
        Route::get('/create', 'TagController@create')->name('tag.create');
        Route::post('/create', 'TagController@store')->name('tag.store');
        Route::get('/{tag:slug}/edit', 'TagController@edit')->name('tag.edit');
        Route::patch('/{tag:slug}/edit', 'TagController@update')->name('tag.update');
        Route::delete('/{tag:slug}/delete', 'TagController@destroy')->name('tag.destroy');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('/create', 'UserController@store')->name('user.store');
        Route::get('/{user:username}', 'UserController@show')->name('user.show');
    });
});




