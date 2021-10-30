<?php

use SebastianBergmann\CodeCoverage\Report\Xml\Report;

Route::group(['middleware' => ['preventbackbutton', 'auth']], function () {
    Route::group(['prefix' => 'sacco'], function () {
        Route::get('/', ['as' => 'sacco.index', 'uses' => 'Sacco\SaccoController@index']);
        Route::get('/create', ['as' => 'sacco.create', 'uses' => 'Sacco\SaccoController@create']);
        Route::post('/', ['as' => 'sacco.store', 'uses' => 'Sacco\SaccoController@store']);
        Route::get('/{sacco}', ['as' => 'sacco.show', 'uses' => 'Sacco\SaccoController@show']);
        Route::get('/{sacco}/edit', ['as' => 'sacco.edit', 'uses' => 'Sacco\SaccoController@edit']);
        Route::put('/{sacco}', ['as' => 'sacco.update', 'uses' => 'Sacco\SaccoController@update']);
        Route::delete('/{sacco}/delete', ['as' => 'sacco.delete', 'uses' => 'Sacco\SaccoController@destroy']);
        Route::post('/add_members', ['as' => 'sacco.add_members', 'uses' => 'Sacco\SaccoController@addMembers']);
        Route::get('/{sacco}/edit_members', ['as' => 'sacco.edit_members', 'uses' => 'Sacco\SaccoController@editMembers']);
        Route::put('/{sacco}/update_members', ['as' => 'sacco.update_members', 'uses' => 'Sacco\SaccoController@updateMembers']);
        Route::delete('/{sacco}/deletemembers', ['as' => 'sacco.delete_members', 'uses' => 'Sacco\SaccoController@destroyMembers']);
        Route::post('/add_collection', ['as' => 'sacco.add_collection', 'uses' => 'Sacco\SaccoController@addCollection']);
        Route::post('/add_editor', ['as' => 'sacco.add_editor', 'uses' => 'Sacco\SaccoController@addEditor']);
        Route::delete('/{editor}/remove_editors', ['as' => 'sacco.remove_editors', 'uses' => 'Sacco\SaccoController@removeEditor']);
        Route::post('/add_coordinators', ['as' => 'sacco.add_coordinators', 'uses' => 'Sacco\SaccoController@addCoordinator']);
        Route::delete('/{coordinator}/remove_coordinators', ['as' => 'sacco.remove_coordinators', 'uses' => 'Sacco\SaccoController@removeCoordinator']);
        Route::get('/{sacco}/group_members',['as' => 'sacco.group_members', 'uses' =>'Sacco\SaccoController@groupMembers']);
        //add groups in bulk

        Route::post('/import', ['as'=>'sacco.import', 'uses'=>'Sacco\SaccoController@importData']);

       /*  Route::post('/import', 'Sacco\SaccoController@importData'); */
        Route::get('/export', 'Sacco/SaccoController@exportData');
    });



    Route::group(['prefix' => 'sacco'], function () {
        Route::get('/download/{filename}', ['as' => 'sacco.download', 'uses' => 'Sacco\SaccoController@download']);
    });

    Route::get('list', 'Sacco\SaccoController@list');




Route::group(['prefix' => 'reports'], function () {
 Route::get('/', ['as' => 'reports.index', 'uses' => 'Reports\ReportsController@index']);
 Route::post('/',['as' => 'reports.index', 'uses'=>'Reports\ReportsController@index']);

 Route::get('/groupReport',['as' => 'reports.groupReport', 'uses' =>'Reports\ReportsController@groupReport']);
 Route::post('/groupReport',['as' => 'reports.groupReport', 'uses' =>'Reports\ReportsController@groupReport']);

 Route::get('/loansReport',['as' => 'reports.loansReport', 'uses' =>'Reports\ReportsController@loansReport']);
 Route::post('/loansReport',['as' => 'reports.loansReport', 'uses' =>'Reports\ReportsController@loansReport']);

 Route::get('/countyReport',['as' => 'reports.countyReport', 'uses' =>'Reports\ReportsController@countyReport']);
 Route::post('/countyReport',['as' => 'reports.countyReport', 'uses' =>'Reports\ReportsController@countyReport']);

 Route::get('/subcountyReport',['as' => 'reports.subcountyReport', 'uses' =>'Reports\ReportsController@subcountyReport']);
 Route::post('/subcountyReport',['as' => 'reports.subcountyReport', 'uses' =>'Reports\ReportsController@subcountyReport']);

 Route::get('/wardReport',['as' => 'reports.wardReport', 'uses' =>'Reports\ReportsController@wardReport']);
 Route::post('/wardReport',['as' => 'reports.wardReport', 'uses' =>'Reports\ReportsController@wardReport']);

 Route::get('/savingsReport',['as' => 'reports.savingsReport', 'uses' =>'Reports\ReportsController@savingsReport']);
 Route::post('/savingsReport',['as' => 'reports.savingsReport', 'uses' =>'Reports\ReportsController@savingsReport']);
});
});
Route::get('downloadGroupReport','Reports\ReportsController@downloadGroupReport');
Route::get('downloadLoansReport','Reports\ReportsController@downloadLoansReport');
Route::get('downloadsavingsReport','Reports\ReportsController@downloadsavingsReport');
Route::get('downloadCountyReport','Reports\ReportsController@downloadCountyReport');
Route::get('downloadSubCountyReport','Reports\ReportsController@downloadSubCountyReport');
Route::get('downloadWardReport','Reports\ReportsController@downloadWardReport');
