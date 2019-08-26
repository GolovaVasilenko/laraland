<?php

//Route::group(['']);
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function() {
    Route::get('/', 'DashboardController@index')->name('admin.index');

    Route::resource('settings', 'SettingsController');


});

Route::get('/', 'PageController@index')->name('main');
Route::get('about', 'PageController@index')->name('about');
Route::get('contacts', 'PageController@index')->name('contacts');
//Route::get('products-on-home', 'ProductController@home')->name('products-on-home');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('lang/{locale}/', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        Cookie::queue(
            Cookie::forever('lang', $locale));
        //App::setLocale($locale);
    }

    return redirect()->back();
});
