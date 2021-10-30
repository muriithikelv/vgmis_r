<?php

Route::group(['middleware' => ['preventbackbutton','auth']], function(){

    Route::group(['prefix' => 'article'], function () {
        Route::get('/',['as' => 'article.index', 'uses'=>'Article\ArticleController@index']);
        Route::get('/create',['as' => 'article.create', 'uses'=>'Article\ArticleController@create']);
        Route::post('/',['as' => 'article.store', 'uses'=>'Article\ArticleController@store']);
        Route::get('/{article}/show',['as'=>'article.show','uses'=>'Article\ArticleController@show']);
        Route::put('/{article}',['as' => 'article.update', 'uses'=>'Article\ArticleController@update']);
        Route::delete('/{article}/delete',['as'=>'article.delete','uses'=>'Article\ArticleController@destroy']);
    });

});

