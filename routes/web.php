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
    return view('welcome');
});
//登录
Route::any("zuoye/login",'Zuoye\Zuoye@login');
Route::any("zuoye/logindo",'Zuoye\Zuoye@logindo');
//表单
Route::middleware('checkuser')->group(function(){
    Route::any("zuoye/form",'Zuoye\Zuoye@form');
    Route::any("zuoye/saves",'Zuoye\Zuoye@saves');
    Route::any("zuoye/list",'Zuoye\Zuoye@list');
    Route::any("zuoye/product/{id}",'Zuoye\Zuoye@product');
});
//品牌
Route::any("brand/create",'Admin\Brand@create');
Route::any("brand/store",'Admin\Brand@store');
Route::any("brand/index",'Admin\Brand@index');
Route::any("brand/upload",'Admin\Brand@upload');
Route::any("brand/edit/{brand_id}",'Admin\Brand@edit');
Route::any("brand/update/{brand_id}",'Admin\Brand@update');
Route::any("brand/destroy/{brand_id}",'Admin\Brand@destroy');

Route::any("brand/brand_name",'Admin\Brand@brand_name');
Route::any("brand/news_ajax",'Admin\Brand@news_ajax');



