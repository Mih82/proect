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


/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

//Route::get('/index/product_select/{id}','IndexController@product_select')->name('product_select');

//Route::get('/basket','BasketController@index')->name('basket_index');
Route::get('/basket/add/{id}','BasketController@add')->name('basket.add');

Route::resource('/index','IndexController');

Route::resource('/product', 'ProductController');

Route::get('/basket/delete/{id}', 'BasketController@destroy')->name('basket.delete');
Route::get('/basket/getTotal', 'BasketController@getTotalQuantity')->name('basket.getTotal');
Route::resource('/basket', 'BasketController');


Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function(){
    Route::get('/', 'Admin\IndexController@index')->name('adminIndex');
    Route::resource('/category','Admin\CategoryController',[
    'names' => [
        'index' => 'admin.category.index',
        'store' => 'admin.category.store',
        'create' => 'admin.category.create',
        'show' => 'admin.category.show',
        'update' => 'admin.category.update',
        'destroy' => 'admin.category.destroy',
        'edit' => 'admin.category.edit'
        ]
      ]);
    Route::resource('/product','Admin\ProductController',[
        'names' => [
            'index' => 'admin.product.index',
            'store' => 'admin.product.store',
            'create' => 'admin.product.create',
            'show' => 'admin.product.show',
            'update' => 'admin.product.update',
            'destroy' => 'admin.product.destroy',
            'edit' => 'admin.product.edit'
        ]
    ]);
    Route::resource('/basket','Admin\BasketController',[
        'names' => [
            'index' => 'admin.basket.index',
            'store' => 'admin.basket.store',
            'create' => 'admin.basket.create',
            'show' => 'admin.basket.show',
            'update' => 'admin.basket.update',
            'destroy' => 'admin.basket.destroy',
            'edit' => 'admin.basket.edit'
        ]
    ]);
    Route::resource('/user','Admin\UserController',[
        'names' => [
            'index' => 'admin.user.index',
            'store' => 'admin.user.store',
            'create' => 'admin.user.create',
            'show' => 'admin.user.show',
            'update' => 'admin.user.update',
            'destroy' => 'admin.user.destroy',
            'edit' => 'admin.user.edit'
        ]
    ]);
    Route::resource('/role','Admin\RoleController',[
        'names' => [
            'index' => 'admin.role.index',
            'store' => 'admin.role.store',
            'create' => 'admin.role.create',
            'show' => 'admin.role.show',
            'update' => 'admin.role.update',
            'destroy' => 'admin.role.destroy',
            'edit' => 'admin.role.edit'
        ]
    ]);
    Route::resource('/mail','Admin\SendMailController',[
        'names' => [
            'index' => 'admin.sendmail.index',
            'store' => 'admin.sendmail.store',
            'create' => 'admin.sendmail.create',
            'show' => 'admin.sendmail.show',
            'update' => 'admin.sendmail.update',
            'destroy' => 'admin.sendmail.destroy',
            'edit' => 'admin.sendmail.edit'
        ]
    ]);
} );

Route::resource('/discussion','DiscussionController');

Route::get('/get_form/{id}', 'DiscussionController@get_form')->name('discussion.get_form');

/*
Route::get('login','Auth\LoginController@showLoginForm');

Route::post('login','Auth\LoginController@login')->name('login');

Route::get('logout','Auth\LoginController@logout');
*/
