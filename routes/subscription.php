<?php

Route::group(['middleware' => ['preventbackbutton','auth']], function(){
    Route::group(['prefix' => 'subscription'], function () {
        Route::get('/',['as' => 'subscription.index', 'uses'=>'Subscription\SubscriptionController@index']);
        Route::get('/create',['as' => 'subscription.create', 'uses'=>'Subscription\SubscriptionController@create']);
        Route::post('/store',['as' => 'subscription.store', 'uses'=>'Subscription\SubscriptionController@store']);
        Route::get('/{subscription}/edit',['as'=>'subscription.edit','uses'=>'Subscription\SubscriptionController@edit']);
        Route::put('/{subscription}',['as' => 'subscription.update', 'uses'=>'Subscription\SubscriptionController@update']);
        Route::delete('/{subscription}/delete',['as'=>'subscription.delete','uses'=>'Subscription\SubscriptionController@destroy']);
        Route::post('/{subscription}/activate',['as'=>'subscription.activate','uses'=>'Subscription\SubscriptionController@activate']);
        Route::post('/{subscription}/deactivate',['as'=>'subscription.deactivate','uses'=>'Subscription\SubscriptionController@deactivate']);
    });
});

