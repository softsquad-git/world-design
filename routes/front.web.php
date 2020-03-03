<?php

Route::get('/', 'Front\HomeController@index')
    ->name('home');

Route::get('shop', 'Front\Products\ProductController@products')
    ->name('shops');

Route::get('product/{id}', 'Front\Products\ProductController@product')
    ->name('product');

Route::post('add-basket', 'Front\Basket\BasketController@store')
    ->name('add-basket');

Route::get('basket', 'Front\Basket\BasketController@items')
    ->name('basket');

Route::group(['prefix' => 'basket'], function (){

    Route::post('add', 'Front\Basket\BasketController@store')
        ->name('add-basket');

    Route::get('all', 'Front\Basket\BasketController@items')
        ->name('basket');

    Route::get('delete/{id}', 'Front\Basket\BasketController@delete')
        ->name('remove-basket');

    Route::post('change-quantity/{basket_id}', 'Front\Basket\BasketController@changeQuantity')
        ->name('basket.change-quantity');
});

Route::get('page/{alias}', 'Front\Pages\PageController@page')
    ->name('page');

Route::get('/404', 'Front\Pages\PageController@notFound')
    ->name('not-found');

Route::get('contact', 'Front\Pages\PageController@contact')
    ->name('contact');

Route::post('checkout', 'Front\Basket\CheckOutController@store')
    ->name('checkout');

Route::get('checkout-success/{id}', 'Front\Basket\CheckOutController@success')
    ->name('checkout.success');

Route::group(['prefix' => 'references'], function (){
    Route::get('/', 'Front\References\ReferenceController@items')
        ->name('references');

    Route::get('create/{token}', 'Front\References\ReferenceController@edit')
        ->name('edit.references');

    Route::post('update/{token}', 'Front\References\ReferenceController@store')
        ->name('store.references');
});
Route::group(['prefix' => 'newsletter'], function (){
    Route::post('save', 'Front\Newsletters\NewsletterController@store')
        ->name('newsletter.save');
    Route::get('remove/{email}', 'Front\Newsletters\NewsletterController@delete')
        ->name('newsletter.remove');
});

