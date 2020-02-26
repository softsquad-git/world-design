<?php

Route::group(['middleware' => 'local_id'], function () {
    Auth::routes();

    Route::group(['middleware' => ['auth', 'activated']], function () {
        Route::get('activate', 'Auth\ActivateController@activate');

        Route::post('activate', 'Auth\ActivateController@activateAccount')
            ->name('activate_account');

        include 'user.web.php';

        Route::group(['middleware' => 'admin'], function () {
            include 'admin.web.php';
        });
    });

    include 'front.web.php';

    Route::get('payment', [
        'as' => 'payment',
        'uses' => 'Payments\PaymentController@payment'
    ]);

    Route::get('payment/status', [
        'as' => 'payment.status',
        'uses' => 'Payments\PaymentController@status'
    ]);
});
