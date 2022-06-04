<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('accounts', 'AccountController@getAllAccounts');

Route::get('account/{account_id}', 'AccountController@getAccount');

Route::post('accounts', 'AccountController@createAccount');

Route::put('accounts/{account_id}', 'AccountController@updateAccount');

Route::delete('accounts/{account_id}', 'AccountController@deleteAccount');

Route::get('contents', 'ContentController@getAllContents');

Route::get('content/{content_id}', 'ContentController@getContent');

Route::post('contents', 'ContentController@createContent');

Route::put('contents/{content_id}', 'ContentController@updateContent');

Route::delete('contents/{content_id}', 'ContentController@deleteContent');
