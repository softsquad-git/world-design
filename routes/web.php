<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


include 'admin.web.php';
include 'user.web.php';
include 'front.web.php';


Route::get('payment', [
    'as' => 'payment',
    'uses' => 'Payments\PaymentController@payment'
]);

Route::get('payment/status', [
    'as' => 'payment.status',
    'uses' => 'Payments\PaymentController@status'
]);
