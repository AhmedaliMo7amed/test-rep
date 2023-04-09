<?php

use Illuminate\Http\Request;
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

Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers'], function () {
    Route::post('/signin', 'Api\AuthSignInController@signin');
    Route::post('/facebook-signin', 'Api\AuthSignInController@signinFacebook');
    Route::post('/google-signin', 'Api\AuthSignInController@signinGoogle');
    Route::post('/signup', 'Api\AuthSignUpController@signup');
    Route::post('/logout', 'Api\AuthLogoutController@logout');
    Route::get('/profile', 'Api\AuthProfileController@profile');
});

Route::group(['middleware' => 'cors', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('homepage', 'Api\HomePageController@getHomePage');
    Route::get('categories/{name}', 'Api\HomePageController@getCategory');
});

Route::group(['middleware' => 'auth:api'], function () {

});
