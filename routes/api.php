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

Route::resource('conversations', 'Api\ConversationController', [
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

Route::resource('categories', 'Api\CategoryController', [
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
