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
/* ============================== CLIEN ==============================*/
Route::group(['prefix' => '/'], function () {
    Route::get('', 'frontendController@getIndex');    
    Route::get('index', 'frontendController@getIndex');   
    Route::group(['prefix' => 'cart'], function () {
        Route::get('add/{id}', 'CartController@getAddCart');
        Route::get('show', 'CartController@getShowCart');
        Route::get('delete/{rowId}', 'CartController@getDeleteCart');
        Route::get('update/{rowId}', 'CartController@getUpdateCart');
    });
    Route::get('register','frontendController@getRegister');
    Route::post('register','frontendController@postRegister');
    Route::get('logout', 'frontendController@getLogout');
    Route::group(['prefix' => 'login'], function () {
        Route::get('/', 'frontendController@getLogin');
        Route::post('/', 'frontendController@postLogin');
    });      
    Route::post('comment/{id}', 'frontendController@postComment');      
    Route::get('order', 'frontendController@getOrder');      
    Route::get('complete', 'frontendController@getComplete');      
    Route::get('search', 'frontendController@search');    
    Route::get('contact', 'frontendController@getContact');    
    Route::post('contact', 'frontendController@postContact');    
    Route::get('category/{type_id}/{manu_id?}', 'frontendController@getCategory')->where('type_id','[0-9]+','manu_id','[0-9]+');    
    Route::get('manufacture/{manu_id}', 'frontendController@getManufacture')->where('manu_id','[0-9]+');    
    Route::get('detail/{id}/{name?}', 'frontendController@getDetail')->where('id','[0-9]+');
});

/* ============================== ADMIN ==============================*/
Route::group(['prefix' => '/mobile-admin'], function () {
    Route::get('', 'backendController@getlogin');   
    Route::post('', 'backendController@postlogin');   
    Route::get('logout', 'backendController@getlogout');   
    Route::get('dashboard', 'backendController@index');
    Route::group(['prefix' => 'protype/'], function () {
        Route::get('show', 'productTypeController@getTypeShow');
        Route::post('add', 'productTypeController@postTypeAdd');
        Route::get('edit/{id}', 'productTypeController@getTypeEdit');
        Route::post('edit/{id}', 'productTypeController@postTypeEdit');
        Route::get('delete/{id}', 'productTypeController@getTypeDelete');
    });
    Route::group(['prefix' => 'manufacture/'], function () {
        Route::get('show', 'manufactureController@getManuShow');
        Route::post('add', 'manufactureController@postManuAdd');
        Route::get('edit/{id}', 'manufactureController@getManuEdit');
        Route::post('edit/{id}', 'manufactureController@postManuEdit');
        Route::get('delete/{id}', 'manufactureController@getManuDelete');
    });
    Route::group(['prefix' => 'customer/'], function () {
        Route::get('show', 'customerController@getCusShow');
        Route::get('viewdetail/{id}', 'customerController@getCusviewdetail');
        Route::get('confirmbill/{id}', 'customerController@getConfirmbill');
        Route::get('delete/{id}', 'customerController@getCusDelete');
        Route::get('deletebill/{id}', 'customerController@getDeleteBill');
        Route::get('viewdetailbill/{id}', 'customerController@getViewDetailBill');
    });
    Route::group(['prefix' => 'product/'], function () {
        Route::get('show', 'ProductController@getProductShow');
        Route::get('add', 'ProductController@getProductAdd');
        Route::post('add', 'ProductController@postProductAdd');
        Route::get('delete/{id}', 'ProductController@getProductDelete');
        Route::get('edit/{id}', 'ProductController@getProductEdit');
        Route::post('edit/{id}', 'ProductController@postProductEdit');
    });
    Route::group(['prefix' => 'comment/'], function () {
        Route::get('show', 'CommentController@getCommentShow');
        Route::get('delete/{id}', 'CommentController@getCommentDelete');
    });

});
