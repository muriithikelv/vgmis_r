<?php

Route::group(['middleware' => ['preventbackbutton','auth']], function(){

    Route::group(['prefix' => 'weather'], function () {
        Route::get('/',['as' => 'weather.index', 'uses'=>'Weather\WeatherController@index']);
        Route::get('/show',['as' => 'weather.show', 'uses'=>'Weather\WeatherController@show']);/*
        Route::get('/create',['as' => 'training.create', 'uses'=>'Training\TrainingsController@create']);
        Route::post('/store',['as' => 'training.store', 'uses'=>'Training\TrainingsController@store']);
        Route::get('/{training}/edit',['as'=>'training.edit','uses'=>'Training\TrainingsController@edit']);
        Route::put('/{training}',['as' => 'training.update', 'uses'=>'Training\TrainingsController@update']);
        Route::delete('/{training}/delete',['as'=>'training.delete','uses'=>'Training\TrainingsController@destroy']); */
    });

});