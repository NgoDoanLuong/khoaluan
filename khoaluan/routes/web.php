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

Route::get('/', function () {
    return view('welcome');
});



Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'hocky'],function(){
      Route::get('list',['as'=>'hocky.list','uses'=>'HocKyController@show']);
      Route::post('list/create',['as'=>'hocky.create','uses'=>'HocKyController@create']);
      Route::get('{id}/delete',['as'=>'hocky.delete','uses'=>'HocKyController@delete']);
    });
    Route::group(['prefix'=>'monhoc'],function (){
      Route::get('/',['as'=>'monhoc.list','uses'=>'MonhocController@show']);
      Route::post('create',['as'=>'monhoc.create','uses'=>'MonhocController@create']);
      Route::post('create/excel',['as'=>'monhoc.excel','uses'=>'MonhocController@createFromExcel']);
    });
});
