<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


# for guest logins
Route::group(['middleware' => 'guest'], function(){
    # socialite authentication routes
    Route::get('auth/{provider?}', "Auth\AuthController@redirectToProvider");
    Route::get('auth/{provider?}/callback', "Auth\AuthController@handleProviderCallback");
    
    # regular login
    Route::post('member/register', 'Auth\AuthController@postRegister');
    Route::get('/', "Auth\AuthController@index");
    Route::post('member/login', "Auth\AuthController@postLogin");
});

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function() {
    Route::get('/', "Dashboard@index");
    Route::get('logout', "Auth\AuthController@getLogout");
});

# steps for step2 and step 3
Route::group(['middleware' => 'auth', 'prefix' => 'order'], function() {
    Route::match(['get'],'/step/2', 'UserOrderController@orderProcess');
    Route::match(['get', 'post'],'/step/3', 'UserOrderController@computeOrder');
});

Route::group(['middleware' => 'auth'], function() {
   Route::post('fetch_menu', function() {
       return App\Menu::all();
   }); 
});