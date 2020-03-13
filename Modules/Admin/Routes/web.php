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
//Lưu ý các Route::group phải để trên các Route không phải là group
Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

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
    Route::get('/','AdminProductController@index')->name('admin.get.list.product');
    Route::get('/create','AdminProductController@create')->name('admin.get.create.product');
    Route::post('/create','AdminProductController@store');
    Route::get('/update/{id}','AdminProductController@edit')->name('admin.get.edit.product');
    Route::post('/update/{id}','AdminProductController@update');
    Route::get('{action}/{id}','AdminProductController@action')->name('admin.get.action.product');
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

//don hang

Route::group(['prefix' => 'transaction'], function() {
    Route::get('/','AdminTransactionController@index')->name('admin.get.list.transaction');
    Route::get('view/{id}','AdminTransactionController@viewOrder')->name('admin.get.view.transaction');
    Route::get('/{key}','AdminTransactionController@deleteOrder')->name('admin.get.delete.transaction');
    Route::get('{action}/{id}','AdminTransactionController@action')->name('admin.get.action.transaction');
});

//lien he

Route::get('/contact','AdminContactController@index')->name('admin.get.list.contact');
Route::get('/{action}/{id}','AdminContactController@action')->name('admin.get.action.contact');






