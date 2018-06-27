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
    return redirect('admin/basic/');
});

Route::resource('admin/basic', 'BasicController');
Route::resource('admin/user', 'UserController');
Route::resource('admin/customer', 'CustomerController');
Route::resource('admin/category', 'CategoryController');
Route::resource('admin/list', 'ListController');
Route::resource('admin/conversation', 'ConversationController');
Route::resource('admin/sentence', 'SentenceController');
Route::resource('admin/contents', 'ContentController');
Route::resource('admin/edit', 'EditController');