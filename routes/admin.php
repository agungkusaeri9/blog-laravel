<?php

Route::group(['prefix' => 'category'], function () {
    Route::get('/', 'CategoryController@index')->name('category.index');
    Route::get('/create', 'CategoryController@create')->name('category.create');
    Route::post('/create', 'CategoryController@store')->name('category.store');
    Route::get('/{category:slug}/edit', 'CategoryController@edit')->name('category.edit');
    Route::patch('/{category:slug}/edit', 'CategoryController@update')->name('category.update');
    Route::delete('/{category:slug}', 'CategoryController@destroy')->name('category.destroy');
});
Route::group(['prefix' => 'tag'], function () {
    Route::get('/', 'TagController@index')->name('tag.index');
    Route::get('/create', 'TagController@create')->name('tag.create');
    Route::post('/create', 'TagController@store')->name('tag.store');
    Route::get('/{tag:slug}/edit', 'TagController@edit')->name('tag.edit');
    Route::patch('/{tag:slug}/edit', 'TagController@update')->name('tag.update');
    Route::delete('/{tag:slug}/delete', 'TagController@destroy')->name('tag.destroy');
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
Route::get('/', 'DashboardController@index')->name('dashboard');