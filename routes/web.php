<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes(['verify' => true, 'register' => false]);

//Route::get('/home', 'HomeController@index')->middleware('verified');

//
//Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
//
//Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
//
//Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
//
//Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
//
//Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');
//
//Route::post(
//    'generator_builder/generate-from-file',
//    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
//)->name('io_generator_builder_generate_from_file');





Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => 'checkauth','localeSessionRedirect', 'localizationRedirect', 'localeViewPath'], function() {

    Route::get('/home', 'HomeController@index');

    Route::resource('users', 'UserController');

    Route::resource('intros', 'IntroController');

    Route::resource('complaints', 'ComplaintsController');

    Route::resource('settings', 'SettingController');

    Route::resource('butchers', 'ButchersController');

    Route::resource('meatTypes', 'MeatTypeController');
});


