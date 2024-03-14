<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\SavingController;

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

Route::apiResource('people', AuthManager::class);

Route::apiResource('reminders', ReminderController::class);

Route::post('/login-retrofit', [AuthManager::class, 'loginRetrofit']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/get-expense', [ExpenseController::class, 'getExpense']);
    Route::post('/post-expense', [ExpenseController::class, 'postExpense']);
    Route::put('/update-expense', [ExpenseController::class, 'updateExpense']);
    Route::delete('/delete-expense', [ExpenseController::class, 'deleteExpense']);

    Route::get('/get-saving', [SavingController::class, 'getSaving']);
    Route::post('/post-saving', [SavingController::class, 'postSaving']);
    Route::put('/update-saving', [SavingController::class, 'updateSaving']);
    Route::delete('/delete-saving', [SavingController::class, 'deleteSaving']);
});
