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

//index首页路由
Route::group(["namespace"=>"Index"],function(){
        //首页
        Route::get("index","IndexController@index")->name("index");
        //链接
        Route::get("link","LinkController@index")->name("link");
        Route::get("link/create","LinkController@create")->name("link.create");
        Route::post("link/story","LinkController@story")->name("link.story");
        Route::get("link/edit/{id}","LinkController@edit")->name("link.edit");
        Route::post("link/update/{id}","LinkController@update");
        //发送记录
        Route::get("record","RecordController@index")->name("record");
        //模板
        Route::get('template','TemplateController@index')->name("template");
        Route::get('template/create','TemplateController@create')->name("template.create");
        Route::post('template/story',"TemplateController@story")->name("template.story");
        Route::get('template/edit/{id}',"TemplateController@edit")->name('template.edit');
        Route::post('template/update/{id}',"TemplateController@update");
        //发送配置
        Route::get('sendconfig','SendConfigController@index');
        Route::get('sendconfig/create','SendConfigController@create');
        Route::post('sendconfig/story','SendConfigController@story');

});
