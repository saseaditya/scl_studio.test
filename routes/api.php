<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

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

Route::middleware('auth:api')->get('/login', function (Request $request) {
    return $request->user();
});

// Route::post('login', 'AjaxController@login');
Route::post('/login', [AjaxController::class, 'login']);
Route::post('/actionCUCategory/{name?}', [AjaxController::class, 'actionCUCategory']);
Route::post('/deleteCategory', [AjaxController::class, 'DeleteCategory']);
Route::post('/actionCUArticle/{name?}', [AjaxController::class, 'actionCUArticle']);
Route::post('/deleteArticle', [AjaxController::class, 'DeleteArticle']);
