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

Route::get('/accounts', [AccountController::class, 'getAllAccounts']);

Route::get('/account/{account_id}', [AccountController::class, 'getAccount']);

Route::post('/accounts', [AccountController::class, 'createAccount']);

Route::put('/account/{account_id}', [AccountController::class, 'updateAccount']);

Route::delete('/account/{account_id}', [AccountController::class, 'deleteAccount']);

Route::get('/contents', [ContentController::class, 'getAllContents']);

Route::get('/content/{content_id}', [ContentController::class, 'getContent']);

Route::post('/contents', [ContentController::class, 'createContent']);

Route::put('/content/{content_id}', [ContentController::class, 'updateContent']);

Route::delete('/content/{content_id}', [ContentController::class, 'deleteContent']);
