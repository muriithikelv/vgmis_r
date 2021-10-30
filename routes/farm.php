<?php

Route::group(['middleware' => ['preventbackbutton', 'auth']], function () {

    Route::group(['prefix' => 'farmer'], function () {
        Route::get('/', ['as' => 'farmer.index', 'uses' => 'Farm\FarmerController@index']);
        Route::get('/create', ['as' => 'farmer.create', 'uses' => 'Farm\FarmerController@create']);
        Route::post('/store', ['as' => 'farmer.store', 'uses' => 'Farm\FarmerController@store']);
        Route::get('/{farmer}/edit', ['as' => 'farmer.edit', 'uses' => 'Farm\FarmerController@edit']);
        Route::put('/{farmer}', ['as' => 'farmer.update', 'uses' => 'Farm\FarmerController@update']);
        Route::delete('/{farmer}/delete', ['as' => 'farmer.delete', 'uses' => 'Farm\FarmerController@destroy']);
    });

    Route::group(['prefix' => 'harvest'], function () {
        Route::get('/', ['as' => 'harvest.index', 'uses' => 'Farm\HarvestController@index']);
        Route::get('/create', ['as' => 'harvest.create', 'uses' => 'Farm\HarvestController@create']);
        Route::get('/{harvest}/show', ['as' => 'harvest.show', 'uses' => 'Farm\HarvestController@show']);
        Route::post('/store', ['as' => 'harvest.store', 'uses' => 'Farm\HarvestController@store']);
        Route::get('/{harvest}/edit', ['as' => 'harvest.edit', 'uses' => 'Farm\HarvestController@edit']);
        Route::put('/{harvest}', ['as' => 'harvest.update', 'uses' => 'Farm\HarvestController@update']);
        Route::delete('/{harvest}/delete', ['as' => 'harvest.delete', 'uses' => 'Farm\HarvestController@destroy']);
    });

    Route::group(['prefix' => 'livestock'], function () {
        Route::get('/', ['as' => 'livestock.index', 'uses' => 'Farm\LivestockController@index']);
        Route::get('/create', ['as' => 'livestock.create', 'uses' => 'Farm\LivestockController@create']);
        Route::get('/{livestock}/show', ['as' => 'livestock.show', 'uses' => 'Farm\LivestockController@show']);
        Route::post('/store', ['as' => 'livestock.store', 'uses' => 'Farm\LivestockController@store']);
        Route::get('/{livestock}/edit', ['as' => 'livestock.edit', 'uses' => 'Farm\LivestockController@edit']);
        Route::put('/{livestock}', ['as' => 'livestock.update', 'uses' => 'Farm\LivestockController@update']);
        Route::delete('/{livestock}/delete', ['as' => 'livestock.delete', 'uses' => 'Farm\LivestockController@destroy']);
    });

    Route::group(['prefix' => 'vet'], function () {
        Route::get('/', ['as' => 'vet.index', 'uses' => 'Farm\VetController@index']);
        Route::get('/create', ['as' => 'vet.create', 'uses' => 'Farm\VetController@create']);
        Route::get('/{vet}/show', ['as' => 'vet.show', 'uses' => 'Farm\VetController@show']);
        Route::post('/store', ['as' => 'vet.store', 'uses' => 'Farm\VetController@store']);
        Route::get('/{vet}/edit', ['as' => 'vet.edit', 'uses' => 'Farm\VetController@edit']);
        Route::put('/{vet}', ['as' => 'vet.update', 'uses' => 'Farm\VetController@update']);
        Route::delete('/{vet}/delete', ['as' => 'vet.delete', 'uses' => 'Farm\VetController@destroy']);
    });
});
