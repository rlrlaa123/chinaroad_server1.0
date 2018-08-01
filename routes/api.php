<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('conversations', 'API\ConversationController', [
    'names' => [
        'index' => '',
        'store' => '',
        'create' => '',
        'update' => '',
        'destroy' => '',
        'edit' => '',
        'show' => '',
    ],
]);

Route::resource('categories', 'API\CategoryController', [
    'names' => [
        'index' => '',
        'store' => '',
        'create' => '',
        'update' => '',
        'destroy' => '',
        'edit' => '',
        'show' => '',
    ],
]);

Route::get('conversations/{category_id}/{conversation_id}/step1', 'API\ConversationController@step1');
Route::get('conversations/{category_id}/{conversation_id}/step3', 'API\ConversationController@step3');

Route::resource('contents', 'API\ContentController', [
    'names' => [
        'index' => '',
        'store' => '',
        'create' => '',
        'update' => '',
        'destroy' => '',
        'edit' => '',
        'show' => '',
    ],
]);

Route::post('register', 'API\UserController@register');
Route::post('snsregister', 'API\UserController@snsRegister');
Route::get('checksnslogin/{email}', 'API\UserController@checkSNSLogin');

Route::get('todayedits', 'API\EditController@todayEdits');
Route::post('sendReply', 'API\EditController@sendReply');
Route::get('checkTodayConfirms/{user_id}', 'API\EditController@checkTodayConfirms');
Route::get('confirm/{email}', 'API\ConfirmController@getConfirm');
Route::get('confirm/{email}/{date}', 'API\ConfirmController@showConfirm');

Route::get('notice', 'API\NoticeController@getNotice');