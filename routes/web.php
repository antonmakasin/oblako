<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {

    Route::get('', 'Admin\IndexController@run')->name('index');

    Route::prefix('users')->name('users.')->group(function() {
        Route::get('', 'Admin\User\IndexController@run')->name('index');
        Route::get('create', 'Admin\User\CreateController@run')->name('create');
        Route::post('store', 'Admin\User\StoreController@run')->name('store');
        Route::get('{id}/edit', 'Admin\User\EditController@run')->name('edit');
        Route::post('{id}/update', 'Admin\User\UpdateController@run')->name('update');
    });

    Route::prefix('files')->name('files.')->group(function() {
        Route::get('', 'Admin\File\IndexController@run')->name('index');
        Route::delete('{id}', 'Admin\File\DestroyController@run')->name('destroy');
    });
});

Route::prefix('auth')->name('auth.')->group(function() {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('login_submit');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});
