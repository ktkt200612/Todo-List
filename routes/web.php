<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);
Route::post('/todo/create', [TodoController::class, 'create']);
Route::post('/todo/update', [TodoController::class, 'update']);
Route::post('/todo/delete', [TodoController::class, 'delete']);

// /に行くとtodocontrollerのindexメソッドを使って、blade表示しなさい。　form action=/todo/deleteのweb.phpに従い、todocontoloerのdeleteメソッドを使い、/へリダイレクトしなさい
