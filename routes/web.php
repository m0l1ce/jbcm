<?php

use Illuminate\Support\Facades\Cache;
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

//前端
Route::get('/','Home\IndexController@index');
Route::get('transmit/oneId/{oneId}/secId/{secId}','Home\IndexController@transmit');
Route::get('brand/oneId/{oneId}/secId/{secId}','Home\IndexController@brand');
Route::get('university/oneId/{oneId}/secId/{secId}','Home\IndexController@university');
Route::get('summit/oneId/{oneId}','Home\IndexController@summit');
Route::get('tutorStudent/oneId/{oneId}/secId/{secId}','Home\IndexController@tutorStudent');
Route::get('aboutUs/oneId/{oneId}/secId/{secId}','Home\IndexController@aboutUs');
Route::get('threeList/pid/{pid}/id/{id}','Home\IndexController@threeList');
Route::get('article/id/{id}','Home\IndexController@article');
Route::get('video/id/{id}','Home\IndexController@video');
Route::get('tutorStudent/detail/id/{id}','Home\IndexController@tsDetail');
Route::get('search','Home\IndexController@search');
Route::get('doSearch','Home\IndexController@doSearch');

//公共链接
Route::get('getHref/id/{id}','Home\IndexController@getHref');
Route::group(['prefix'=>'page'],function (){
    Route::get('pageTop40','Home\PageController@pageTop40');
    Route::get('meeting_2018','Home\PageController@meeting_2018');
    Route::get('meeting_2018_map','Home\PageController@meeting_2018_map');
});

//移动端
Route::group(['prefix'=>'mobile'],function (){
    Route::get('index','Mobile\IndexController@index');
    Route::get('transmit/oneId/{oneId}/secId/{secId}','Mobile\IndexController@transmit');
    Route::get('brand/oneId/{oneId}/secId/{secId}','Mobile\IndexController@brand');
    Route::get('university/oneId/{oneId}/secId/{secId}','Mobile\IndexController@university');
    Route::get('summit/oneId/{oneId}','Mobile\IndexController@summit');
    Route::get('tutorStudent/oneId/{oneId}/secId/{secId}','Mobile\IndexController@tutorStudent');
    Route::get('aboutUs/oneId/{oneId}/secId/{secId}','Mobile\IndexController@aboutUs');
});

//API
Route::get('getCategoryPage','Home\IndexController@getCategoryPage');       //首页数据获取
//Route::get('upload','Home\IndexController@getCategoryPage');

//测试
Route::get('/test', function () {
   $abc = \App\Models\Admin::where('email','>','?')->toSql();
   dd(asset('123'));
   dd($abc);
})->middleware('role');

//后台
Route::group(['prefix'=>'admin'],function(){
    Route::get('index','Admin\IndexController@index');			//首页
    Route::get('home','Admin\IndexController@home');			//首页内容
    Route::get('login','Admin\IndexController@login');			//登陆界面
    Route::post('login','Admin\IndexController@store');			//执行登陆
   	Route::get('loginout','Admin\IndexController@loginOut');	//退出


    Route::resource('admin','Admin\AdminController');           //管理员
    Route::resource('category','Admin\CategoryController');     //分类
    Route::resource('navigation','Admin\NavigationController'); //导航
    Route::resource('label','Admin\LabelController');           //标签
    Route::resource('user','Admin\UserController');             //用户
    Route::resource('tutorStudent','Admin\TutorStudentController');  //导师学员
    Route::resource('video','Admin\VideoController');           //视频
    Route::resource('article','Admin\ArticleController');       //文章
    Route::resource('advertising','Admin\AdvertisingController');//广告
    Route::resource('hotbot','Admin\HotbotController');         //热搜

    //功能路由
    Route::get('choiceness/setting/type/{type}/id/{id}','Admin\ChoicenessController@setting');                  //设置精选
    Route::get('choiceness/cancel/id/{id}','Admin\ChoicenessController@cancel');                                //取消精选
    Route::get('tutorStudent/showIndex/id/{id}','Admin\TutorStudentController@showIndex');                      //首页展示（导师学员）
    Route::get('tutorStudent/changeSort/id/{id}/sort/{sort}','Admin\TutorStudentController@changeSort');        //修改排序（导师学员）

});

//后台辅助功能
Route::get('/assist',function (){
    return view('layouts.assist');
});


