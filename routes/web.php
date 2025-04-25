<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::put('/tasks/{id}/status', [TaskController::class, 'status'])->name('tasks.status');

Route::resource('tasks', TaskController::class);
