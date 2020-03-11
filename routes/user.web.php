<?php

Route::group(['prefix' => 'user'], function (){

    Route::get('/', 'User\UserController@profile')
        ->name('user.profile');

    Route::post('update', 'User\Settings\SettingController@update')
        ->name('user.update.data');

    Route::get('orders', 'User\Orders\OrderController@items')
        ->name('user.orders');

    Route::get('order/{id}', 'User\Orders\OrderController@find')
        ->name('user.order');

    Route::get('change-password-view', 'User\Settings\SettingController@changePass')
        ->name('change.password.view');

    Route::post('change-password', 'User\Settings\SettingController@newPass')
        ->name('change.password.user');

});
