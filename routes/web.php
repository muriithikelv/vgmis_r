<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'User\LoginController@index');
Route::get('login', 'User\LoginController@index');
Route::post('login', 'User\LoginController@Auth')->name('login');


Route::get('terms', 'User\HomeController@terms');

Route::get('mail', 'User\HomeController@mail');

Route::group(['middleware' => ['preventbackbutton','auth']], function(){

    Route::get('dashboard', 'User\HomeController@index');
    Route::get('profile', 'User\HomeController@profile');
    Route::get('logout', 'User\LoginController@logout');
    Route::resource('user','User\UserController',['parameters'=> ['user'=>'user_id']]);
    Route::resource('userRole','User\RoleController',['parameters'=> ['userRole'=>'role_id']]);
    Route::resource('rolePermission','User\RolePermissionController',['parameters'=> ['rolePermission'=>'id']]);
    Route::post('rolePermission/get_all_menu', 'User\RolePermissionController@getAllMenu');
    Route::resource('changePassword','User\ChangePasswordController',['parameters'=> ['changePassword'=>'id']]);

});

