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

Route::group(['namespace' => 'API'], function ($router)
 {


 });

Route::group(['middleware' => 'api', 'prefix' => 'client', 'namespace' => 'API'], function ($router)
 {
   Route::post('register', 'AuthClientController@register');
    Route::post('login', 'AuthClientController@login');
    Route::post('logout', 'AuthClientController@logout');
    Route::post('refresh', 'AuthClientController@refresh');
    Route::post('me', 'AuthClientController@me');
});





Route::group(['middleware' => 'api', 'prefix' => 'super_visor', 'namespace' => 'API'], function ($router)
 {
   Route::post('register', 'AuthSuperVisorController@register');
    Route::post('login', 'AuthSuperVisorController@login');
    Route::post('logout', 'AuthSuperVisorController@logout');
    Route::post('refresh', 'AuthSuperVisorController@refresh');
    Route::post('me', 'AuthSuperVisorController@me');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['middleware' => 'api', 'namespace' => 'API'], function ($router){

    Route::post('new-password', 'AuthClientController@newPassword');

  Route::resource('intros', 'IntroAPIController');

  Route::resource('complaints', 'ComplaintsAPIController');

  Route::resource('settings', 'SettingAPIController');


  Route::resource('butchers', 'ButchersAPIController');


  Route::resource('meat_types', 'MeatTypeAPIController');



    Route::post('favorites', 'ButchersAPIController@favorites');
    Route::post('favorites/add', 'ButchersAPIController@addFavorites');

});
