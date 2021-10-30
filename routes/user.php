<?php

Route::group(['middleware' => ['preventbackbutton','auth']], function(){
    Route::group(['prefix' => 'users'], function () {
        Route::get('/',['as' => 'users.index', 'uses'=>'User\UserController@index']);
        Route::get('/audit',['as' => 'users.audit', 'uses'=>'User\UserController@audit']);
        Route::get('/create',['as' => 'users.create', 'uses'=>'User\UserController@create']);
        Route::post('/store',['as' => 'users.store', 'uses'=>'User\UserController@store']);
        Route::get('/{users}/edit',['as'=>'users.edit','uses'=>'User\UsersController@edit']);/*
        Route::get('/{users}',['as'=>'users.show','uses'=>'User\UserController@show']); */
        Route::put('/{users}',['as' => 'users.update', 'uses'=>'User\UserController@update']);
        Route::delete('/{users}/delete',['as'=>'users.delete','uses'=>'User\UserController@destroy']);
    });
});

