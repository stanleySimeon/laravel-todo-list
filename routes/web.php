<?php

use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodolistController::class, 'index']) -> name('index');
Route::post('/', [TodolistController::class, 'store']) -> name('store');
Route::post('/update-editable-content/{todolist:id}', [TodolistController::class, 'updateEditableContent']) -> name('update-editable-content');
Route::delete('/{todolist:id}', [TodolistController::class, 'destroy']) -> name('destroy');
