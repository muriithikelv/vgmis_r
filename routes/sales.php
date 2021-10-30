<?php

Route::group(['middleware' => ['preventbackbutton','auth']], function(){

    Route::group(['prefix' => 'sales'], function () {
        Route::get('/',['as' => 'sales.index', 'uses'=>'Sales\SalesController@index']);
        /* Route::get('/create',['as' => 'training.create', 'uses'=>'Training\TrainingsController@create']);
        Route::post('/store',['as' => 'training.store', 'uses'=>'Training\TrainingsController@store']);
        Route::get('/{training}/edit',['as'=>'training.edit','uses'=>'Training\TrainingsController@edit']);
        Route::put('/{training}',['as' => 'training.update', 'uses'=>'Training\TrainingsController@update']);
        Route::delete('/{training}/delete',['as'=>'training.delete','uses'=>'Training\TrainingsController@destroy']); */
    });
    Route::get('invoice', 'Sales\SalesController@invoice');
});

