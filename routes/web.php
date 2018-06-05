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
Route::resource('/','Admin\login\LoginController');
//验证码时
Route::get('/index/captcha/{tmp}', 'RegisterController@captcha');
//登录页面路由  
Route::resource('/admin/login','Admin\login\LoginController');
Route::group(['middleware'=>'login'],function(){
	//加载后台模板
	Route::resource('/admin/index','Admin\IndexController');
	//相册管理
	Route::resource('/admin/photo','Admin\Photo\PhotoController');
	Route::get('/admin/photo/delete/{id}','Admin\Photo\PhotoController@delete');
	//添加图片
	Route::post('/admin/picture/upload/{uid}','Admin\Photo\PhotoController@upload');
	Route::get('/admin/picture/{id}','Admin\Photo\PhotoController@picture');
	//轮播管理路由
	Route::resource('admin/lunbo','Admin\Lunbo\LunboController');
	Route::post('/admin/lunbo/upload','Admin\Lunbo\LunboController@upload');
	Route::get('/admin/lunbo/delete/{id}','Admin\Lunbo\LunboController@delete');
	//说说管理路由
	Route::resource('/admin/stalk','Admin\Stalk\StalkController');
	//文章管理路由
	Route::resource('/admin/articles','Admin\Articles\articlesController');
	//文章显示详情路由
	Route::get('/admin/article/{id}','Admin\Articles\articlesController@details');
	//分类管理路由
	Route::resource('/admin/cate','Admin\Cate\CatesController');
	//分类管理---添加子类
	Route::get('/admin/cate/addson/{id}','Admin\Cate\CatesController@addson');
	Route::get('/admin/cate/insert/{pid}','Admin\Cate\CatesController@insert');
	//栏目管理
	Route::resource('/admin/blank','Admin\Blank\BlankController');
	//网站配置管理
	Route::resource('/admin/config','Admin\Config\ConfigController');
	//用户管理
	Route::resource('/admin/user','Admin\User\UserController');
	//个人详情
	Route::resource('/admin/preson','Admin\login\PersonalController');
	//标签管理
	Route::resource('/admin/taginfo','Admin\Taginfo\TaginfoController');
	//友链管理
	Route::resource('/admin/link','Admin\link\LinkController');
	//后台主页
	Route::resource('/admin','Admin\IndexController');
	
});
/**
		前台路由
*/
Route::resource('/home/index','Home\IndexController');



