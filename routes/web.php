<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\TestsController::class, 'index']);
Route::get('/task1', [\App\Http\Controllers\TaskFirstController::class, 'solution']);
Route::get('/task2', [\App\Http\Controllers\TaskSecondController::class, 'solution']);
Route::get('/task3', [\App\Http\Controllers\TestsController::class, 'index']);

Route::get('/task4', [\App\Http\Controllers\GroupsController::class, 'index']);
Route::get('/task4/{group}', [\App\Http\Controllers\GroupsController::class, 'show']);

Route::get('/task5', [\App\Http\Controllers\AjaxFormController::class, 'create']);
Route::post('/task5', [\App\Http\Controllers\AjaxFormController::class, 'store']);

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();
});
