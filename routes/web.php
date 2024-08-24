<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\ExpenseController::class, 'index'])->name('expense');
Route::post('/add', [App\Http\Controllers\ExpenseController::class, 'storeExpense'])->name('storeExpense');
Route::get('/delete/{id}', [App\Http\Controllers\ExpenseController::class, 'deleteExpense'])->name('deleteExpense');

