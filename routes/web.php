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
    Route::get('pages/edit/{id}', 'PageController@edit')->name('pages.edit');
    Route::get('pages/create', 'PageController@create')->name('pages.create');
    Route::post('pages', 'PageController@store')->name('pages.store');
    Route::put('pages/update', 'PageController@update')->name('pages.update');
    Route::get('pages/remove/{id}', 'PageController@destroy')->name('pages.remove');

    //Menu
    Route::get('menu', 'MenuController@index')->name('menu.list');
    Route::get('menu/create', 'MenuController@create')->name('menu.create');
    Route::get('menu/edit/{id}', 'MenuController@edit')->name('menu.edit');
    Route::post('menu', 'MenuController@store')->name('menu.store');
    Route::put('menu/update', 'MenuController@update')->name('menu.update');
    Route::get('menu/delete/{id}', 'MenuController@destroy')->name('menu.delete');

    Route::get('menu/items/{menu_id}', 'MenuController@itemsList')->name('menu.items');
    Route::post('menu/item/store', 'MenuController@itemStore')->name('menu.item.store');
    Route::post('menu/sortable', 'MenuController@sortable')->name('menu.sortable');
    Route::get('menu/item/edit/{id}', 'MenuController@itemEdit')->name('menu.item.edit');
    Route::get('menu/item/store/{id}', 'MenuController@itemDelete')->name('menu.item.delete');
    Route::put('menu/item/update', 'MenuController@itemUpdate')->name('menu.item.update');
});

Route::get('/', 'PageController@index')->name('main');
Route::get('about', 'PageController@getPage')->name('about');
Route::get('contacts', 'PageController@getPage')->name('contacts');
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
