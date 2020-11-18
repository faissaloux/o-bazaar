<?php

use Illuminate\Support\Facades\Route;

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

    Route::prefix('user')->group(function () {
        Route::post('login', 'ApiController@login');
    });

    // User
    Route::prefix('user')->middleware('auth:api')->group(function () {
        Route::get('/profile', 'ApiController@profile');
        Route::post('/profile/update', 'ApiController@updateProfile');
        Route::post('/profile/address', 'ApiController@indexAdresses');
        Route::post('/profile/address/add', 'ApiController@addAddress');
        Route::post('/profile/address/update', 'ApiController@updateAddress');
        Route::post('/profile/address/remove', 'ApiController@removeAddress');

        Route::post('/wishlist', 'ApiController@indexWishlist');
        Route::post('/{store_id}/wishlist/add/{product_id}', 'ApiController@addWishlist');
        Route::post('/{store_id}/{product_id}/wishlist/update/{wishlist_id}', 'ApiController@updateWishlist');
        Route::post('/wishlist/remove/{wishlist_id}', 'ApiController@removeWishlist');

        Route::post('update/password', 'ApiController@updatePassword');
        Route::post('/logout', 'ApiController@logout');
    });

    // Store
    Route::prefix('stores')->middleware('auth:api')->group(function () {
        Route::get('/', 'ApiController@storesIndex');
        Route::get('/{store_id}/search', 'ApiController@search');
        Route::get('/{store_id}/products', 'ApiController@storeProducts');
        Route::get('/{store_id}/product/{product_id}', 'ApiController@productDetails');
        Route::get('/{store_id}/category/{category_id}', 'ApiController@categoryProducts');
    });
