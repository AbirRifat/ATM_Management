<?php

use App\Http\Controllers\ATMController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckPinValidation;


// Public Routes
Route::get('/', [ATMController::class, 'index'])->name('dashboard'); // Main ATM dashboard

Route::post('/validate-pin', [ATMController::class, 'handlePinRequest'])->name('atm.validate.pin');

// Authenticated Routes
Route::middleware(['auth', CheckPinValidation::class])->group(function () {
    // Authenticated Routes
    Route::get('/user/dashboard', [ATMController::class, 'userDashboard'])->name('userDashboard');
    Route::get('/user/balance', [ATMController::class, 'balance'])->name('balance');
    Route::get('/user/withdrawForm', [ATMController::class, 'withdrawForm'])->name('withdraw.form');
    Route::post('/user/withdraw', [ATMController::class, 'withdraw'])->name('withdraw');
    Route::get('/user/deposit', [ATMController::class, 'depositForm'])->name('deposit.form');
    Route::post('/user/deposit', [ATMController::class, 'deposit'])->name('deposit');
    Route::get('/user/transfer', [ATMController::class, 'transferForm'])->name('transfer.form');
    Route::post('/user/transfer', [ATMController::class, 'transfer'])->name('transfer');
    Route::get('/user/pin_change', [ATMController::class, 'showPinChangeForm'])->name('pin.change.form');
    Route::post('/user/pin_change', [ATMController::class, 'changePin'])->name('pin.change');
    Route::get('/user/dashboard/logout', [ATMController::class, 'logout'])->name('logout');
});


