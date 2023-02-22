<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/item', [TodoListController::class, 'index'])->name('item');

Route::prefix('/item')->group(function (){
    Route::post('/store', [TodoListController::class, 'store']);
    Route::put('/{id}', [TodoListController::class, 'update']);
    Route::delete('/{id}', [TodoListController::class, 'destroy']);
});
