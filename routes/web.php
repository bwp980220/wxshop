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

Route::get('/', function(){
    return view('welcome');
});


//登陆
route::any('login','LoginController@login');
//执行登陆
route::get('logindo','LoginController@logindo');
//短信验证码
route::any('sendcode','LoginController@sendcode');
//注册
route::any('register','LoginController@register');
//注册路由
route::any('verify/create','CaptchaController@create');
//执行注册
route::get('registerdo','LoginController@registerdo');
//发送验证码
route::any('regauth','LoginController@regauth');
//找回密码
route::any('findpwd','LoginController@findpwd');
//下一步
route::any('next','LoginController@next');


//商品详情
route::any('shopcontent','GoodsController@shopcontent');
//全部商品
route::any('allshops','GoodsController@allshops');
//重新获取商品+分页
route::get('getgoodsinfo','GoodsController@getgoodsinfo');
//商品分类展示
route::post('newshops','GoodsController@newshops');



//首页
route::any('index','IndexController@index'); 
//最新揭晓
route::any('indexsa','IndexController@indexsa');
//我的潮购
route::any('userpage','IndexController@userpage');
//潮购记录
route::any('recorddetail','IndexController@recorddetail');
//我的钱包
route::any('mywallet','IndexController@mywallet');
//购物车
route::any('shopcart','IndexController@shopcart');
//二维码分享
route::any('invite','IndexController@invite');
//收货地址
route::any('address','IndexController@address');
//晒单
route::any('willshare','IndexController@willshare');
//我的晒单
route::any('share','IndexController@share');
