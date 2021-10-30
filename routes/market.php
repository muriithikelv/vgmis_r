<?php

Route::group(['middleware' => ['preventbackbutton','auth']], function(){

    Route::group(['prefix' => 'category'], function () {
        Route::get('/',['as' => 'category.index', 'uses'=>'Market\CategoryController@index']);
        Route::get('/create',['as' => 'category.create', 'uses'=>'Market\CategoryController@create']);
        Route::get('/{category}/show',['as' => 'category.show', 'uses'=>'Market\CategoryController@show']);
        Route::post('/store',['as' => 'category.store', 'uses'=>'Market\CategoryController@store']);
        Route::get('/{category}/edit',['as'=>'category.edit','uses'=>'Market\CategoryController@edit']);
        Route::put('/{category}',['as' => 'category.update', 'uses'=>'Market\CategoryController@update']);
        Route::delete('/{category}/delete',['as'=>'category.delete','uses'=>'Market\CategoryController@destroy']);
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/',['as' => 'product.index', 'uses'=>'Market\ProductController@index']);
        Route::get('/create',['as' => 'product.create', 'uses'=>'Market\ProductController@create']);
        Route::get('/{product}/show',['as' => 'product.show', 'uses'=>'Market\ProductController@show']);
        Route::post('/store',['as' => 'product.store', 'uses'=>'Market\ProductController@store']);
        Route::get('/{product}/edit',['as'=>'product.edit','uses'=>'Market\ProductController@edit']);
        Route::put('/{product}',['as' => 'product.update', 'uses'=>'Market\ProductController@update']);
        Route::post('/{product}/purchase',['as'=> 'product.purchase', 'uses' =>'Market\ProductController@purchase']);
        Route::post('/{product}/cancelPurchase',['as'=> 'product.cancelPurchase', 'uses' =>'Market\ProductController@cancelPurchase']);
        Route::delete('/{product}/delete',['as'=>'product.delete','uses'=>'Market\ProductController@destroy']);
    });

    Route::group(['prefix' => 'vendors'], function () {
        Route::get('/',['as' => 'vendors.index', 'uses'=>'Market\VendorController@index']);
        Route::get('/create',['as' => 'vendors.create', 'uses'=>'Market\VendorController@create']);
        Route::get('/{vendors}/show',['as' => 'vendors.show', 'uses'=>'Market\VendorController@show']);
        Route::post('/store',['as' => 'vendors.store', 'uses'=>'Market\VendorController@store']);
        Route::get('/{vendors}/edit',['as'=>'vendors.edit','uses'=>'Market\VendorController@edit']);
        Route::put('/{vendors}',['as' => 'vendors.update', 'uses'=>'Market\VendorController@update']);
        Route::delete('/{vendors}/delete',['as'=>'vendors.delete','uses'=>'Market\VendorController@destroy']);
    });
});

