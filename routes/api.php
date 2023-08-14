<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\MessageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/message', [MessageController::class, 'getRegister'])->name('user.register.get');
Route::post('/message', [MessageController::class, 'setRegister'])->name('user.register.set');

Route::get('/chat/{id}', [MessageController::class, 'index'])->name('chat.index');
Route::post('/chat/{id}', [MessageController::class, 'store'])->name('chat.store');

Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('getDashboard');
Route::post('/dashboard', [DashboardController::class, 'setDashboard'])->name('setDashboard');