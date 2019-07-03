<?php


Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function() {
    Route::get('/', 'DashboardController@index')->name('admin.index');
    Route::resource('settings', 'SettingsController');
});

Route::get('/', 'PageController@index')->name('main');
Route::get('about', 'PageController@index')->name('about');
Route::get('products-on-home', 'ProductController@home')->name('products-on-home');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
