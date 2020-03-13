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
//Trang chủ
Route::get('/','HomeController@index')->name('home');
Route::get('quickView/{id}','HomeController@quickView')->name('get.quickView.product');
//sản phẩm
Route::get('/danh-muc/{slug}-{id}','CategoryController@getListProduct')->name('get.list.product');
Route::get('/san-pham','CategoryController@getListProduct')->name('get.product.list');
Route::get('san-pham/{slug}-{id}','DetailProductController@index')->name('get.detail.product');


//Bài viết
Route::get('/bai-viet','ArticleController@getListArticle')->name('get.list.article');
Route::get('/bai-viet/{slug}-{id}','ArticleController@getDetailArticle')->name('get.detail.article');


Route::group(['namespace' => 'auth'], function() {
	//dang ky
    Route::get('/dang-ky','RegisterController@getRegister')->name('get.register');
    Route::post('/dang-ky','RegisterController@postRegister');
    //dang nhap
    Route::get('/dang-nhap','LoginController@getLogin')->name('get.login');
    Route::post('/dang-nhap','LoginController@postLogin');

    //dang xuat
    Route::get('/dang-xuat','LoginController@getLogout')->name('get.logout');
});


//Gio hang

Route::group(['prefix' => 'shopping'], function() {
    Route::post('/add/{id}','ShoppingController@addProducts')->name('add.products.shopping');
    Route::get('danh-sach','ShoppingController@showProducts')->name('show.products.shopping');
    Route::get('/delete/{rowId}','ShoppingController@delete')->name('delete.products.shopping');
    Route::get('/quantity/{rowId}/{id}','ShoppingController@quantity')->name('quantity.products.shopping');
    Route::post('/quantity/{rowId}/{id}','ShoppingController@quantity');

});

//thanh toan
Route::group(['prefix' => 'shopping','middleware'=> 'CheckLoginUser'], function() {
    Route::get('thanh-toan','ShoppingController@getPay')->name('get.pay.shopping');
    Route::post('thanh-toan','ShoppingController@saveTransaction');
});

//Lien he

    Route::get('/lien-he','ContactController@index')->name('get.contact');
    Route::post('lien-he','ContactController@postContact');

//Page tinh

   Route::get('thong-tin/{page}-{id}','PageStaticController@action')->name('get.action.static') ;



