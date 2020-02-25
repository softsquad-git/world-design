<?php

Route::group(['prefix' => 'admin'], function (){
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::group(['prefix' => 'products'], function (){
        Route::get('/', 'Admin\Products\ProductController@items');
        Route::get('item/{id}', 'Admin\Products\ProductController@item');
        Route::get('form', 'Admin\Products\ProductController@create');
        Route::get('form/{id}', 'Admin\Products\ProductController@edit');
        Route::post('form', 'Admin\Products\ProductController@store');
        Route::post('form/{id}', 'Admin\Products\ProductController@update');
        Route::get('remove/{id}', 'Admin\Products\ProductController@delete');
        Route::post('upload-images', 'Admin\Products\ProductController@uploadImages');
        Route::get('remove-image/{id}', 'Admin\Products\ProductController@removeImage');
    });
    Route::group(['prefix' => 'colors'], function (){
        Route::get('/', 'Admin\Colors\ColorController@items');
        Route::get('form', 'Admin\Colors\ColorController@create');
        Route::get('form/{id}', 'Admin\Colors\ColorController@edit');
        Route::post('form', 'Admin\Colors\ColorController@store');
        Route::post('form/{id}', 'Admin\Colors\ColorController@update');
        Route::get('remove/{id}', 'Admin\Colors\ColorController@delete');
    });
    Route::group(['prefix' => 'categories'], function (){
        Route::get('/', 'Admin\Categories\CategoryController@items');
        Route::get('item/{id}', 'Admin\Categories\CategoryController@item');
        Route::get('form', 'Admin\Categories\CategoryController@create');
        Route::get('form/{id}', 'Admin\Categories\CategoryController@edit');
        Route::post('form', 'Admin\Categories\CategoryController@store');
        Route::post('form/{id}', 'Admin\Categories\CategoryController@update');
        Route::get('remove/{id}', 'Admin\Categories\CategoryController@delete');
    });
    Route::group(['prefix' => 'users'], function (){
        Route::get('/', 'Admin\Users\UserController@items');
        Route::get('item/{id}', 'Admin\Users\UserController@item');
        Route::get('form', 'Admin\Users\UserController@create');
        Route::get('form/{id}', 'Admin\Users\UserController@edit');
        Route::post('form', 'Admin\Users\UserController@store');
        Route::post('form/{id}', 'Admin\Users\UserController@update');
        Route::get('remove/{id}', 'Admin\Users\UserController@delete');
        Route::get('locked', 'Admin\Users\UserController@locked');
        Route::get('news', 'Admin\Users\UserController@news');
        Route::get('lock/{id}', 'Admin\Users\UserController@lock');
    });
    Route::group(['prefix' => 'settings'], function (){
        Route::get('/', 'Admin\Settings\SettingController@form');
        Route::post('form', 'Admin\Settings\SettingController@store');
        Route::post('form', 'Admin\Settings\SettingController@update');
    });
    Route::group(['prefix' => 'pages'], function (){
        Route::get('/', 'Admin\Pages\PageController@items');
        Route::get('form', 'Admin\Pages\PageController@create');
        Route::get('form/{id}', 'Admin\Pages\PageController@edit');
        Route::get('remove/{id}', 'Admin\Pages\PageController@delete');
        Route::get('item/{id}', 'Admin\Pages\PageController@item');
        Route::post('store', 'Admin\Pages\PageController@store');
        Route::post('update/{id}', 'Admin\Pages\PageController@update');
        Route::post('upload-file', 'Admin\Pages\PageController@uploadFileContent');
        Route::group(['prefix' => 'hp'], function (){
            Route::get('/', 'Admin\Pages\HomePageController@form');
            Route::post('form', 'Admin\Pages\HomePageController@store');
            Route::post('form/{id}', 'Admin\Pages\HomePageController@update');
        });
    });
    Route::group(['prefix' => 'checkouts'], function (){
        Route::get('/', 'Admin\CheckOuts\CheckOutController@items');
    });

    Route::group(['prefix' => 'references'], function (){
        Route::get('/', 'Admin\References\ReferenceController@items');
        Route::get('remove/{id}', 'Admin\References\ReferenceController@delete');
        Route::get('accept/{id}', 'Admin\References\ReferenceController@accept');
    });
});
