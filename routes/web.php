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

// Route::get('/', function () { 
//     return view('welcome');
// });
// Route::get('/','Homecontroller@index')->name('home');

Auth::routes();
Route::get('/admin/icons',function(){
    return view('admin.icons');
});

Route::group(['prefix'=>'admin'],function(){
    Route::get('/','AdminController@index')->name('admin.home');

    // Module for cat_post
    Route::group(['prefix'=>'post'],function(){
        Route::get('list-cat-post','CatPostController@index')->name('admin.list.catpost');//finish
        Route::post('add-cat-post','CatPostController@postcat')->name('admin.post.catpost');
        Route::get('edit={id}','CatPostController@geteditcat')->name('admin.edit.catpost');
        Route::post('edit={id}','CatPostController@updatecat')->name('admin.update.catpost');
        Route::get('add-cat-post','CatPostController@getaddcat')->name('admin.add.catpost');//finish
        Route::get('delete={id}','CatPostController@deletecat')->name('admin.del.catpost');//finish

        //Module for post
        Route::get('list-post','PostController@index')->name('admin.list.post');//finish
        Route::get('add-post','PostController@getadd')->name('admin.add.post');//finish
        Route::post('add-post','PostController@posttopost')->name('admin.post.post');//finish
        Route::get('edit-post={id}','PostController@getedit')->name('admin.edit.post');//finish
        Route::post('edit-post={id}','PostController@updatepost')->name('admin.update.post');//finish
        Route::get('del={id}','PostController@deletepost')->name('admin.del.post');//finish
    });

    // show post content
    Route::get('post={id}','AdminController@showpost')->name('admin.showpost');
});