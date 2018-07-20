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

Route::get('401', 'AdminController@unauthorized');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::get('/', function () {
    return redirect('admin/conversation/');
});

Route::get('/admin', function () {
    return redirect('admin/conversation/');
});

Route::resource('admin/basic', 'BasicController');
Route::resource('admin/admin', 'AdminController');
Route::post('admin/authorize', 'AdminController@authorizeAdmin')->name('admin.authorize');

Route::resource('admin/leader', 'LeaderController');
Route::post('admin/leader/assign', 'LeaderController@assignLeader')->name('leader.assign');

Route::resource('admin/teacher', 'TeacherController');
Route::post('admin/teacher/assign', 'TeacherController@assignTeacher')->name('teacher.assign');

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
Route::get('admin/confirm', 'ConfirmController@index');
Route::post('admin/confirm/teacher', 'ConfirmController@teacherConfirm')->name('confirm.teacher');

Route::prefix('admin/conversation/{category_id}')->group(function() {
    Route::get('/', 'ConversationController@index')->name('conversation.index');
    Route::post('/', 'ConversationController@store')->name('conversation.store');
    Route::get('/create', 'ConversationController@create')->name('conversation.create');
    Route::get('/{conversation_id}', 'ConversationController@show')->name('conversation.show');
    Route::put('/{conversation_id}', 'ConversationController@update')->name('conversation.update');
    Route::delete('/{conversation_id}', 'ConversationController@destroy')->name('conversation.destroy');
    Route::get('/{conversation_id}/edit', 'ConversationController@edit')->name('conversation.edit');
});

Route::resource('admin/classification', 'ClassificationController');
Route::resource('admin/contents', 'ContentController');
Route::post('admin/contents/activate', 'ContentController@activateContents')->name('contents.activate');
Route::resource('admin/edit', 'EditController');