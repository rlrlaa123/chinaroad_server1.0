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
Route::resource('admin/conversation', 'CategoryController', [
    'names' => [
        'index' => 'category.index',
        'store' => 'category.store',
        'create' => 'category.create',
        'update' => 'category.update',
        'destroy' => 'category.destroy',
        'edit' => 'category.edit',
    ],
    'except' => [
        'show',
    ]
]);
Route::prefix('admin/conversation/{category_id}')->group(function() {
    Route::get('/', 'ListController@index')->name('list.index');
    Route::post('/', 'ListController@store')->name('list.store');
    Route::get('/create', 'ListController@create')->name('list.create');
    Route::get('/{list_id}', 'ListController@show')->name('list.show');
    Route::put('/{list_id}', 'ListController@update')->name('list.update');
    Route::delete('/{list_id}', 'ListController@destroy')->name('list.destroy');
    Route::get('/{list_id}/edit', 'ListController@edit')->name('list.edit');
});

Route::prefix('admin/conversation/{category_id}/{list_id}')->group(function () {
    Route::get('/', 'ConversationController@index')->name('conversation.index');
    Route::post('/', 'ConversationController@store')->name('conversation.store');
    Route::get('/create', 'ConversationController@create')->name('conversation.create');
    Route::get('/{conversation_id}', 'ConversationController@show')->name('conversation.show');
    Route::put('/{conversation_id}', 'ConversationController@update')->name('conversation.update');
    Route::delete('/{conversation_id}', 'ConversationController@destroy')->name('conversation.destroy');
    Route::get('/{conversation_id}/edit', 'ConversationController@edit')->name('conversation.edit');
});
//Route::resource('admin/conversation', 'ConversationController');
Route::resource('admin/sentence', 'SentenceController');
Route::resource('admin/contents', 'ContentController');
Route::resource('admin/edit', 'EditController');