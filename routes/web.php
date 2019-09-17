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


Route::prefix('/Demo')->group(function () {
    Route::get('demo','democontroller@demo' );
    Route::get('js','democontroller@js' );
    Route::post('add','democontroller@add' );
    Route::get('demosql','democontroller@demosql' );

//    Route::post('add_do','IndexController@store' );
//    Route::get('index','IndexController@index' );
//    Route::get('destroy/{id}','IndexController@destroy');
//    Route::get('edit/{id}','IndexController@edit');
//    Route::match(['get','post'],'update/{id}','IndexController@update');
});

Route::any('/index','Admin\IndexController@Index');

//科室
Route::any('/OfficeAddList','Admin\OfficeController@OfficeAddList');//科室添加页面
Route::any('/OfficeDo','Admin\OfficeController@OfficeDo');//科室添加
Route::any('/OfficeList','Admin\OfficeController@OfficeList');//科室展示
Route::any('/OfficeDel','Admin\OfficeController@OfficeDel');//科室删除
Route::any('/OfficeRecover','Admin\OfficeController@OfficeRecover');//恢复
Route::any('/OfficeUpdateList','Admin\OfficeController@OfficeUpdateList');//修改页面
Route::any('/OfficeUpdate','Admin\OfficeController@OfficeUpdate');//修改



//资讯
Route::any('/ConsultAddList','Admin\ConsultController@ConsultAddList');//资讯添加页面
Route::any('/ConsultAddDo','Admin\ConsultController@ConsultAddDo');//资讯添加
Route::any('/consultList','Admin\ConsultController@ConsultList');//资讯展示
Route::any('/ConsultDel','Admin\ConsultController@ConsultDel');//资讯删除
Route::any('/ConsultUpdateList','Admin\ConsultController@ConsultUpdateList');//资讯修改页面
Route::any('/ConsultUpdateDo','Admin\ConsultController@ConsultUpdateDo');//资讯修改
Route::any('/ConsultPart','Admin\ConsultController@ConsultPart');//资讯详情
Route::any('/ConsultRecover','Admin\ConsultController@ConsultRecover');//资讯恢复



//前台
Route::any('/','Index\IndexController@index');//访问页面
Route::any('/IndexOffice','Index\IndexController@IndexOffice');//科室资讯
Route::any('/IndexPart','Index\IndexController@IndexPart');//科室内容


