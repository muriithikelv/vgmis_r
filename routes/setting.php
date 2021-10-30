<?php

Route::group(['middleware' => ['preventbackbutton','auth']], function(){

    Route::group(['prefix' => 'generalSettings'], function () {
        Route::get('/',['as' => 'generalSettings.index', 'uses'=>'Setting\GeneralSettingController@index']);
        Route::post('/',['as' => 'generalSettings.store', 'uses'=>'Setting\GeneralSettingController@store']);
        Route::get('/{generalSettings}/edit',['as'=>'generalSettings.edit','uses'=>'Setting\GeneralSettingController@edit']);
        Route::put('/{generalSettings}',['as' => 'generalSettings.update', 'uses'=>'Setting\GeneralSettingController@update']);

        Route::post('printHeadSettings',['as' => 'printHeadSettings.store', 'uses'=>'Setting\GeneralSettingController@printHeadSettingsStore']);
        Route::put('printHeadSettings/{id}',['as' => 'printHeadSettings.update', 'uses'=>'Setting\GeneralSettingController@printHeadSettingsUpdate']);
    });

    Route::group(['prefix' => 'county'], function () {
        Route::get('/',['as' => 'county.index', 'uses'=>'Setting\CountyController@index']);
        Route::get('/create',['as' => 'county.create', 'uses'=>'Setting\CountyController@create']);
        Route::post('/store',['as' => 'county.store', 'uses'=>'Setting\CountyController@store']);
        Route::get('/{county}/show',['as'=>'county.show','uses'=>'Setting\CountyController@show']);
        Route::put('/{county}',['as' => 'county.update', 'uses'=>'Setting\CountyController@update']);
        Route::delete('/{county}/delete',['as'=>'county.delete','uses'=>'Setting\CountyController@destroy']);
    });

    Route::group(['prefix' => 'subcounty'], function () {
        Route::get('/',['as' => 'subcounty.index', 'uses'=>'Setting\SubCountyController@index']);
        Route::get('/create',['as' => 'subcounty.create', 'uses'=>'Setting\SubCountyController@create']);
        Route::post('/store',['as' => 'subcounty.store', 'uses'=>'Setting\SubCountyController@store']);
        Route::get('/{subcounty}/show',['as'=>'subcounty.show','uses'=>'Setting\SubCountyController@show']);
        Route::put('/{subcounty}',['as' => 'subcounty.update', 'uses'=>'Setting\SubCountyController@update']);
        Route::delete('/{subcounty}/delete',['as'=>'subcounty.delete','uses'=>'Setting\SubCountyController@destroy']);
    });

    Route::group(['prefix' => 'ward'], function () {
        Route::get('/',['as' => 'ward.index', 'uses'=>'Setting\WardController@index']);
        Route::get('/create',['as' => 'ward.create', 'uses'=>'Setting\WardController@create']);
        Route::post('/store',['as' => 'ward.store', 'uses'=>'Setting\WardController@store']);
        Route::get('/{ward}/show',['as'=>'ward.show','uses'=>'Setting\WardController@show']);
        Route::put('/{ward}',['as' => 'ward.update', 'uses'=>'Setting\WardController@update']);
        Route::delete('/{ward}/delete',['as'=>'ward.delete','uses'=>'Setting\WardController@destroy']);
    });

    Route::group(['prefix' => 'location'], function () {
        Route::get('/',['as' => 'location.index', 'uses'=>'Setting\LocationController@index']);
        Route::get('/create',['as' => 'location.create', 'uses'=>'Setting\LocationController@create']);
        Route::post('/store',['as' => 'location.store', 'uses'=>'Setting\LocationController@store']);
        Route::get('/{location}/show',['as'=>'location.show','uses'=>'Setting\LocationController@show']);
        Route::put('/{location}',['as' => 'location.update', 'uses'=>'Setting\LocationController@update']);
        Route::delete('/{location}/delete',['as'=>'location.delete','uses'=>'Setting\LocationController@destroy']);
    });

    Route::group(['prefix' => 'region'], function () {
        Route::get('/',['as' => 'region.index', 'uses'=>'Setting\RegionController@index']);
        Route::get('/create',['as' => 'region.create', 'uses'=>'Setting\RegionController@create']);
        Route::post('/store',['as' => 'region.store', 'uses'=>'Setting\RegionController@store']);
        Route::get('/{region}/edit',['as'=>'region.edit','uses'=>'Setting\RegionController@edit']);
        Route::put('/{region}',['as' => 'region.update', 'uses'=>'Setting\RegionController@update']);
        Route::delete('/{region}/delete',['as'=>'region.delete','uses'=>'Setting\RegionController@destroy']);
    });
});

