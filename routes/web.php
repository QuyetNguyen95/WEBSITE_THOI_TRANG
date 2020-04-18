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

  //dang nhap bang google
  Route::get('google/callback','GoogleController@handleProviderCallback');
  Route::get('google/login','GoogleController@redirectProvider')->name('google.login');


Route::group(['namespace' => 'auth'], function() {
	//dang ky
    Route::get('/dang-ky','RegisterController@getRegister')->name('get.register');
    Route::post('/dang-ky','RegisterController@postRegister');
    //dang nhap
    Route::get('/dang-nhap','LoginController@getLogin')->name('get.login');
    Route::post('/dang-nhap','LoginController@postLogin');

    //dang xuat
    Route::get('/dang-xuat','LoginController@getLogout')->name('get.logout');

    //lấy lại mật khẩu

    Route::get('/lay-lai-mat-khau','ForgotPasswordController@getFormResetPassword')->name('get.reset.password');
	Route::post('/lay-lai-mat-khau','ForgotPasswordController@sendCodeResetPassword');
	Route::get('/password/reset','ForgotPasswordController@resetPassword')->name('get.link.reset.password');
	Route::post('/password/reset','ForgotPasswordController@saveResetPassword');
});


//Gio hang

Route::group(['prefix' => 'shopping'], function() {
    Route::post('/add/{id}','ShoppingController@addProducts')->name('add.products.shopping');
    Route::get('danh-sach','ShoppingController@showProducts')->name('show.products.shopping');
    Route::post('/delete','ShoppingController@delete')->name('delete.products.shopping');
    Route::post('/quantity','ShoppingController@quantity')->name('quantity.products.shopping');

});

//đánh giá
Route::group(['prefix' => 'ajax','middleware'=> 'CheckLoginRatting'], function() {
    Route::post('danh-gia/{id}','RatingController@saveRating')->name('post.rating.product');
    Route::post('reply/{id}','RatingController@saveReplyComment')->name('post.reply.comment.product');

});

//sản phẩm vừa xem
Route::group(['prefix' => 'ajax'], function() {
    Route::post('renderViewProduct','HomeController@renderViewProduct')->name('render.view.product');
});

//thanh toán
Route::group(['prefix' => 'shopping','middleware'=> 'CheckLoginUser'], function() {
    Route::get('thanh-toan','ShoppingController@getPay')->name('get.pay.shopping');
    Route::post('thanh-toan','ShoppingController@saveTransaction');
});

//trang quản lý user
Route::group(['prefix' => 'user','middleware'=> 'CheckLoginUser'], function() {
    Route::get('/dashboard','UserController@index')->name('get.index.user');
    Route::get('/info','UserController@updateInfo')->name('get.update.user');
    Route::post('/info','UserController@saveInfo');
    Route::get('/pass','UserController@updatePass')->name('get.pass.user');
    Route::post('/pass','UserController@savePass');
    Route::get('/watch','UserController@justWatch')->name('get.just.watch.user');
    Route::post('/watch','UserController@viewjustWatch')->name('get.view.just.watch.user');
    Route::get('/bestSell','UserController@bestSellingProduct')->name('get.best.sell.user');
    Route::get('/showDetailOrder/{id}','UserController@showDetailOrder')->name('get.show.detail.order.user');
    Route::get('generate-pdf/{id}', 'UserController@pdfview')->name('generate-pdf');
});




//Lien he

    Route::get('/lien-he','ContactController@index')->name('get.contact');
    Route::post('lien-he','ContactController@postContact');

//Page tinh

   Route::get('thong-tin/{page}-{id}','PageStaticController@action')->name('get.action.static') ;





