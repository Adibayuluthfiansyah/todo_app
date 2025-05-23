<?php

use App\Http\Controllers\Test\TestingController;
use App\Http\Controllers\Todo\TodoContoller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testing', [TestingController::class, 'index']);

// Route::get('/todo', function () {
//     return view('todo.app');
// });

Route::get('/todo', [TodoContoller::class, 'index']);

Route::post('/todo', [TodoContoller::class, 'store']);
