<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['api']], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', 'User\LoginController@APIAuth');
        Route::post('/signup', 'User\UserController@APIstore');
    });

    Route::post('/password/request', 'User\ChangePasswordController@APIPasswordRequest');
    Route::post('/password/reset', 'User\ChangePasswordController@APIPasswordReset');

    Route::get('/articles', 'Article\ArticleController@APIArticles');

    Route::get('/saccos', 'Sacco\SaccoController@APISaccos');
    Route::post('/sacco/search', 'Sacco\SaccoController@APISearchSaccoMember');

    Route::get('/categories', 'Market\CategoryController@APICategories');

    Route::get('/counties', 'Setting\CountyController@APICounties');
    Route::get('/subcounties', 'Setting\SubCountyController@APISubCounties');
    Route::get('/ward', 'Setting\WardController@APIWard');
    Route::get('/locations', 'Setting\LocationController@APILocations');
    Route::get('/regions', 'Setting\RegionController@APIRegions');

    Route::post('/subscribe', 'Subscription\SubscriptionController@APISubscribe');
    Route::get('/subscriptions', 'Subscription\SubscriptionController@APISubscriptionHistory');

    Route::get('/harvest', 'Farm\HarvestController@APIHarvest');
    Route::post('/harvest', 'Farm\HarvestController@APIHarvestStore');
    Route::put('/harvest', 'Farm\HarvestController@APIHarvestUpdate');
    Route::delete('/harvest', 'Farm\HarvestController@APIHarvestDelete');

    Route::get('/collections/{id}', 'Sacco\SaccoController@APICollection');
    Route::post('/collections', 'Sacco\SaccoController@APICollectionStore');
    Route::put('/collections', 'Sacco\SaccoController@APICollectionUpdate');
    Route::delete('/collections', 'Sacco\SaccoController@APICollectionDelete');

    Route::get('/livestock', 'Farm\LivestockController@APILivestock');
    Route::post('/livestock', 'Farm\LivestockController@APILivestockStore');
    Route::put('/livestock', 'Farm\LivestockController@APILivestockUpdate');
    Route::delete('/livestock', 'Farm\LivestockController@APILivestockDelete');

    Route::post('/vendor/signup', 'Market\VendorController@APIVendorRegister');
    Route::get('/vendor', 'Market\VendorController@APIVendorDetails');
    Route::get('/vendors', 'Market\VendorController@APIVendors');


    Route::get('/products', 'Market\ProductController@APIProducts');
    Route::post('/vendor/product', 'Market\ProductController@APICreateProduct');
    Route::get('/vendor/products', 'Market\ProductController@APIVendorProducts');
    Route::post('/products/purchase', 'Market\ProductController@APIPurchaseProducts');
    Route::post('/products/confirmpurchase', 'Market\ProductController@APIConfirmPurchase');
    Route::post('/products/cancelpurchase', 'Market\ProductController@APICancelPurchase');

    Route::post('/vet/signup', 'Farm\VetController@APIVetRegister');
    Route::get('/vet', 'Farm\VetController@APIVetDetails');
    Route::get('/vets', 'Farm\VetController@APIVets');

    Route::get('/trainings', 'Training\TrainingsController@APITrainings');
});
