<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Main\CourseController;
use App\Http\Controllers\Main\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::match(['GET', 'POST'], '/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');

Route::get('/', [CourseController::class, 'index'])->name('course.index')->middleware('auth:sanctum');
Route::get('/{id}', [CourseController::class, 'detail'])->name('course.detail')->middleware('auth:sanctum');

# Transaction Routes
Route::group(['prefix' => 'transaction', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/{$id}', [TransactionController::class, 'index'])->name('transaction.index');
    Route::post('/', [TransactionController::class, 'store'])->name('transaction.store');
});
