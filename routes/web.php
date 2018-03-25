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

Route::get('/','FrontController@index')->name('trangchu');
Route::get('/cate/{id}/{slug}','FrontController@cate')->name('cate');
Route::get('/detail/{id}/{slug}','FrontController@detail')->name('detail');
Route::get('/contact','FrontController@getcontact')->name('contact');
Route::post('/contact','FrontController@postcontact');
Route::get('muahang/{id}/{slug}','FrontController@muahang')->name('muahang');
Route::get('giohang','FrontController@getgiohang')->name('getgiohang');
Route::get('xoagiohang/{id}','FrontController@xoagiohang')->name('xoagiohang');
Route::get('update/{id}/{slug}','FrontController@update_giohang')->name('update_giohang');
Route::post('giohang','FrontController@postgiohang');
Auth::routes();




Route::group(['prefix' => 'admin-men', 'middleware'=> 'auth'],function(){
  Route::get('/',function(){
    return view('admin.dashboard.dashboard');
  })->name('dashboard');
  Route::group(['prefix'=>'user'],function(){
    Route::get('/','UserController@getListUser')->name('getListUser');
    Route::get('add','UserController@getAddUser')->name('getAddUser');
    Route::post('add','UserController@postAddUser');
    Route::get('edit/{id}','UserController@getEditUser')->name('getEditUser');
    Route::post('edit/{id}','UserController@postEditUser');
    Route::get('del/{id}','UserController@getDelUser')->name('getDelUser');
    Route::get('logout','UserController@logout')->name('logout');
  });
  Route::group(['prefix'=>'cate'],function(){
    Route::get('/','CateController@getListCate')->name('getListCate');
    Route::get('add','CateController@getAddCate')->name('getAddCate');
    Route::post('add','CateController@postAddCate');
    Route::get('edit/{id}','CateController@getEditCate')->name('getEditCate');
    Route::post('edit/{id}','CateController@postEditCate');
    Route::get('del/{id}','CateController@getDelCate')->name('getDelCate');
  });
  Route::group(['prefix'=>'product'],function(){
    Route::get('/','ProductController@getListProduct')->name('getListProduct');
    Route::get('add','ProductController@getAddProduct')->name('getAddProduct');
    Route::post('add','ProductController@postAddProduct');
    Route::get('edit/{id}','ProductController@getEditProduct')->name('getEditProduct');
    Route::post('edit/{id}','ProductController@postEditProduct');
    Route::get('del-img-detal/{id}','ProductController@del_img_detai');
    Route::get('del/{id}','ProductController@getDelProduct')->name('getDelProduct');
  });
  Route::group(['prefix'=>'slide'],function(){
    Route::get('add','SlideController@getAddSlide')->name('getAddSlide');
    Route::post('add','SlideController@postAddSlide');
    Route::get('list','SlideController@getListSlide')->name('getListSlide');
    Route::get('edit/{id}','SlideController@getEditSlide')->name('getEditSlide');
    Route::post('edit/{id}','SlideController@postEditSlide');
    Route::get('del/{id}','SlideController@getDelSlide')->name('getDelSlide');
    Route::get('addthree','SlideController@getAddThreeSlide')->name('getAddThreeSlide');
    Route::post('addthree','SlideController@postAddThreeSlide');
    Route::get('listthree','SlideController@getListThreeSlide')->name('getListThreeSlide');
    Route::get('editthree/{id}','SlideController@getEditThreeSlide')->name('getEditThreeSlide');
    Route::post('editthree/{id}','SlideController@postEditThreeSlide');
    Route::get('delthree/{id}','SlideController@getDelThreeSlide')->name('getDelThreeSlide');
  });
  Route::group(['prefix'=>'donhang'],function(){
    Route::get('/','DonHangController@getDonHang')->name('getDonHang');
    Route::get('chi-tiet/{id}','DonHangController@getChiTiet')->name('getChiTiet');
    Route::post('chi-tiet/{id}','DonHangController@postChiTiet');
    Route::get('xoa-don-hang/{id}','DonHangController@getXoaDonHang')->name('getXoaDonHang');
  });
});
