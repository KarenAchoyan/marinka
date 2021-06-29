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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/test','TestController@test');
Route::prefix('/brand')->group(function(){
    Route::get('get','BrandController@index');
    Route::post('store','BrandController@store');
    Route::get('edit/{id}','BrandController@edit');
    Route::get('delete/{id}','BrandController@destroy');
    Route::post('update/{id}','BrandController@update');
});

Route::prefix('/slider')->group(function(){
    Route::get('get','SliderController@index');
    Route::post('store','SliderController@store');
    Route::get('edit/{id}','SliderController@edit');
    Route::get('delete/{id}','SliderController@destroy');
    Route::post('update/{id}','SliderController@update');
});
Route::prefix('/category')->group(function (){
    Route::get('get','CategoryController@index');
    Route::post('store','CategoryController@store');
    Route::get('edit/{id}','CategoryController@edit');
    Route::get('delete/{id}','CategoryController@destroy');
    Route::post('update/{id','CategoryController@update');
});
Route::prefix('/product')->group(function (){
    Route::get('get','ProductController@index');
    Route::post('store','ProductController@store');
    Route::get('edit/{id}','ProductController@edit');
    Route::get('delete/{id}','ProductController@destroy');
    Route::post('update/{id','ProductController@update');
});
