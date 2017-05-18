<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//登录路由
Route::group(["namespace"=>"Login"],function(){
        Route::get('/login','LoginController@login')->name("login");
        Route::get('/login/captcha','LoginController@getCaptcha')->name('login/captcha');
        Route::post('/login/validate','LoginController@loginValidate')->name('login/validate');
});

//index路由
Route::group(["namespace"=>"Index"],function(){
        //首页
        Route::get("/index","IndexController@index")->name("index");
        //链接
        Route::get("/link","LinkController@index")->name("link");
        Route::get("/link/create","LinkController@create")->name("link.create");
        Route::post("/link/story","LinkController@story")->name("link.story");

        //发送记录
        Route::get("/record","RecordController@index")->name("record");
});