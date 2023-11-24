<?php

use App\Http\Controllers\CardDepositController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KYCController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\TradeStockController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;


Route::view('/', 'pages.index')->name('index');
Route::view('/about', 'pages.about')->name('about');
Route::view('/blog', 'pages.blog')->name('blog');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/payment-method', 'pages.payment')->name('payment');
Route::view('/cgi-syss/suspendedpage', 'welcome')->name('welcome');


Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::patch('updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::get('setting', [UserController::class, 'setting'])->name('setting');
    Route::get('security', [UserController::class, 'security'])->name('security');
    Route::post('change/password', [UserController::class, 'changePasswordSave'])->name('changePasswordSave');

    Route::get('kyc', [KYCController::class, 'kyc'])->name('kyc');
    Route::post('store/kyc', [KYCController::class, 'storeKyc'])->name('storeKyc');

    // Deposit Route
    Route::get('deposit', [DepositController::class, 'deposit'])->name('deposit');
    Route::get('deposit/method', [DepositController::class, 'depositMethod'])->name('depositMethod');
    Route::post('crypto-deposit', [DepositController::class, 'cryptoDeposit'])->name('cryptoDeposit');
    Route::get('deposit/status/{id}', [DepositController::class, 'status'])->name('status');

    // Card Deposit Route
    Route::post('card/deposit', [CardDepositController::class, 'generatePaymentUrl'])->name('generatePaymentUrl');

    Route::get('trade-room', [TradeController::class, 'trade'])->name('trade');
    Route::post('place/trade-room', [TradeController::class, 'placeTrade'])->name('placeTrade');
    Route::get('close/trade/history', [TradeController::class, 'closeTrades'])->name('closeTrades');

    Route::get('withdraw', [WithdrawController::class, 'withdraw'])->name('withdraw');
    Route::post('process/withdrawal', [WithdrawController::class, 'processWithdraw'])->name('processWithdraw');
    Route::get('withdrawal/status/{id}', [WithdrawController::class, 'withdrawStatus'])->name('withdrawStatus');

    Route::get('stocks', [TradeStockController::class, 'stock'])->name('stock.list');
    Route::get('trade/stock/{id}', [TradeStockController::class, 'tradeStock'])->name('tradeStock');
    Route::post('trade/stock', [TradeStockController::class, 'processTrade'])->name('processTrade');
    Route::get('trade/success/{id}', [TradeStockController::class, 'stockSuccess'])->name('stockSuccess');

    Route::get('stock/history', [HistoryController::class, 'stockHistory'])->name('stockHistory');
    Route::get('forex/history', [HistoryController::class, 'forexHistory'])->name('forexHistory');

    Route::get('transaction/deposit', [TransactionsController::class, 'depositHistory'])->name('depositHistory');
    Route::get('transaction/withdrawal', [TransactionsController::class, 'withdrawHistory'])->name('withdrawHistory');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
