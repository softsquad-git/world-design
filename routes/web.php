<?php
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::group(['middleware' => 'local_id'], function () {
    Auth::routes();

    Route::group(['middleware' => ['auth']], function () {
        Route::get('activate', 'Auth\ActivateController@activate');

        Route::post('activate-account', 'Auth\ActivateController@activateAccount')
            ->name('activate_account');

        Route::group(['middleware' => 'activated'], function (){
            include 'user.web.php';

            Route::group(['middleware' => 'admin'], function () {
                include 'admin.web.php';
            });
        });
    });

    include 'front.web.php';

    Route::get('payment/{id}', [
        'as' => 'payment',
        'uses' => 'Payments\PaymentController@paymentPayU'
    ]);

    Route::get('payment/status/{_token}', [
        'as' => 'payment.status',
        'uses' => 'Payments\PaymentController@status'
    ]);

    Route::get('payment-check', [
        'as' => 'payment.check',
        'uses' => 'Payments\PaymentController@check'
    ]);

    Route::get('order/{_token}', [
        'as' => 'find.payment',
        'uses' => 'Front\Basket\CheckOutController@findOrder'
    ]);
});

Route::get('send-key', 'Admin\ConfigController@getKey');

Route::get('create-admin', 'Admin\ConfigController@create')
    ->name('config-account');

Route::post('create-admin-acc', 'Admin\ConfigController@createAdminAccount')
    ->name('admin.account.store');

Route::get('reset-password', 'Auth\ResetPasswordController@view')
    ->name('reset.view');

Route::post('send-verify-key', 'Auth\ResetPasswordController@sendVerifyKey')
    ->name('reset');

Route::get('new-password/{_token}', 'Auth\ResetPasswordController@newPassView')
    ->name('password.new');

Route::post('password-reset', 'Auth\ResetPasswordController@resetPassword')
    ->name('password.reset');
