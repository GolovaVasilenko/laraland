<?php

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function() {
    Route::get('/', 'DashboardController@index')->name('admin.index');

    //Settings
    Route::get('settings', 'SettingsController@index')->name('settings.list');
    Route::post('settings', 'SettingsController@store')->name('settings.store');
    Route::get('settings/edit/{id}', 'SettingsController@edit')->name('settings.edit');
    Route::put('settings/update', 'SettingsController@update')->name('settings.update');
    Route::get('settings/remove/{id}', 'SettingsController@remove')->name('settings.delete');

    //Pages
    Route::get('pages', 'PageController@index')->name('pages.list');
    Route::get('pages/ajax', 'PageController@ajax')->name('pages.data');
    Route::get('pages/add', 'PageController@add')->name('pages.add');
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
