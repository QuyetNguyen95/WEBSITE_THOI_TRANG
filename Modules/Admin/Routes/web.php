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

//login admin manager
Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', 'AdminAuthController@getLogin')->name('admin.login');
    Route::post('/login', 'AdminAuthController@login');
    //logout
    Route::get('/', 'AdminAuthController@logoutAdmin')->name('get.admin.logout');
});


// PHẦN QUẢN LÝ ADMIN
Route::group(['prefix' => 'admin','middleware'=> 'CheckLoginAdmin'], function () {

    //Trang chủ
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    //danh muc san pham
    Route::group(['prefix' => 'category'], function() {
        Route::get('/','AdminCategoryController@index')->name('admin.get.list.category');
        Route::get('/create','AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/create','AdminCategoryController@store');
        Route::get('/update/{id}','AdminCategoryController@edit')->name('admin.get.edit.category');
        Route::post('/update/{id}','AdminCategoryController@update');
        Route::get('/{action}/{id}','AdminCategoryController@action')->name('admin.get.delete.category');
    });


    //san pham
    Route::group(['prefix' => 'product'], function() {
        Route::post('/import','AdminProductController@import')->name('admin.get.import.product');
        Route::get('/','AdminProductController@index')->name('admin.get.list.product');
        Route::get('/create','AdminProductController@create')->name('admin.get.create.product');
        Route::post('/create','AdminProductController@store');
        Route::get('/update/{id}','AdminProductController@edit')->name('admin.get.edit.product');
        Route::post('/update/{id}','AdminProductController@update');
        Route::get('{action}/{id}','AdminProductController@action')->name('admin.get.action.product');
    });
    //Thống kê
    Route::group(['prefix' => 'statistical'], function () {
        Route::get('/day','AdminStatisticalController@day')->name('admin.get.day.statistical');
        Route::get('/month','AdminStatisticalController@month')->name('admin.get.month.statistical');
        Route::get('/year','AdminStatisticalController@year')->name('admin.get.year.statistical');
    });

    //tin tuc
    Route::group(['prefix' => 'article'], function() {

        Route::get('/','AdminArticleController@index')->name('admin.get.list.article');
        Route::get('/create','AdminArticleController@create')->name('admin.get.create.article');
        Route::post('/create','AdminArticleController@store');
        Route::get('/update/{id}','AdminArticleController@edit')->name('admin.get.edit.article');
        Route::post('/update/{id}','AdminArticleController@update');
        Route::get('{action}/{id}','AdminArticleController@action')->name('admin.get.action.article');
    });
    //page tĩnh
    Route::group(['prefix' => 'page_static'], function() {

        Route::get('/','AdminPageStaticController@index')->name('admin.get.list.static');
        Route::get('/create','AdminPageStaticController@create')->name('admin.get.create.static');
        Route::post('/create','AdminPageStaticController@store');
        Route::get('/update/{id}','AdminPageStaticController@edit')->name('admin.get.edit.static');
        Route::post('/update/{id}','AdminPageStaticController@update');
    });

    //thanh vien
    Route::group(['prefix' => 'user'], function() {
        Route::get('/','AdminUserController@index')->name('admin.get.list.user');
        Route::get('{action}/{id}','AdminUserController@action')->name('admin.get.action.user');
    });


      //lien he

      Route::get('/contact','AdminContactController@index')->name('admin.get.list.contact');
      Route::get('contact/{action}/{id}','AdminContactController@action')->name('admin.get.action.contact');


    //don hang

    Route::group(['prefix' => 'transaction'], function() {
        Route::get('/','AdminTransactionController@index')->name('admin.get.list.transaction');
        Route::get('view/{id}','AdminTransactionController@viewOrder')->name('admin.get.view.transaction');
        Route::get('generate-pdf/{id}', 'AdminTransactionController@pdfview')->name('admin.generate-pdf');
        Route::get('export', 'AdminTransactionController@export')->name('admin.export.excel');
        Route::get('order/{id}','AdminTransactionController@deleteOrder')->name('admin.get.delete.order');
        Route::get('transaction/{action}/{id}','AdminTransactionController@action')->name('admin.get.action.transaction');
    });

    //quản lý thông tin của admin
    Route::group(['prefix' => 'information'], function () {
        Route::get('/info','AdminInformationController@updateInfo')->name('get.info.admin');
        Route::post('/info','AdminInformationController@saveInfo');
        Route::get('/pass','AdminInformationController@updatePass')->name('get.pass.admin');
        Route::post('/pass','AdminInformationController@savePass');
        Route::get('/showListStaff','AdminInformationController@showStaff')->name('get.show.list.staff');
        Route::get('{action}/{id}','AdminInformationController@action')->name('admin.get.action.staff');
        Route::get('/addStaff','AdminInformationController@addStaff')->name('get.add.staff');
        Route::post('/addStaff','AdminInformationController@postStaff');
    });

    //quản lý kho hàng
    Route::get('/warehouse','AdminWarehouseController@index')->name('admin.get.list.warehouse');
    //đánh giá
    Route::get('/rating','AdminRatingController@index')->name('admin.get.list.rating');
    Route::get('/{action}/{id}','AdminRatingController@action')->name('admin.get.action.rating');

});







