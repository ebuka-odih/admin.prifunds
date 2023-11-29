<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminFundingController;
use App\Http\Controllers\Admin\AdminImageController;
use App\Http\Controllers\Admin\AdminPaymentMethodController;
use App\Http\Controllers\Admin\AdminStockController;
use App\Http\Controllers\Admin\AdminTradesController;
use App\Http\Controllers\Admin\AdminWithdrawal;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('security', [AdminController::class, 'security'])->name('security');
    Route::post('security', [AdminController::class, 'storePassword'])->name('storePassword');
    Route::get('user/details/{id}', [UserController::class, 'userDetails'])->name('userDetails');
    Route::get('users', [UserController::class, 'users'])->name('users');
    Route::delete('delete/user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
    Route::get('suspend/user/{id}', [UserController::class, 'suspend'])->name('suspend');
    Route::get('verify/user/{id}', [UserController::class, 'verifyUser'])->name('verifyUser');

    // Deposit Route
    Route::get('deposits/', [DepositController::class, 'deposits'])->name('deposits');
    Route::get('view/deposits/{id}', [DepositController::class, 'viewDeposit'])->name('viewDeposit');
    Route::get('approve/deposits/{id}', [DepositController::class, 'approveDeposit'])->name('approveDeposit');
    Route::delete('delete/deposits/{id}', [DepositController::class, 'deleteDeposit'])->name('deleteDeposit');
    Route::post('admin/deposits', [DepositController::class, 'adminDeposit'])->name('adminDeposit');

    // Withdrawal Route
    Route::get('withdrawals', [AdminWithdrawal::class, 'withdrawal'])->name('withdrawal');
    Route::post('withdrawal/percent/{id}', [AdminWithdrawal::class, 'withdrawPercent'])->name('withdrawPercent');
    Route::get('approve/withdrawal/{id}', [AdminWithdrawal::class, 'approve_withdrawal'])->name('approve_withdrawal');
    Route::delete('delete/withdrawal/{id}', [AdminWithdrawal::class, 'delete_withdrawal'])->name('delete_withdrawal');

    Route::get('add/fund', [AdminFundingController::class, 'fund'])->name('fund');
    Route::post('add/fund', [AdminFundingController::class, 'sendFund'])->name('sendFund');

    Route::resource('wallet', AdminPaymentMethodController::class);
    Route::resource('stock', AdminStockController::class);
    Route::resource('package', PackageController::class);
    Route::resource('property', PropertyController::class);



    Route::get('image/{id}', [AdminImageController::class, 'image'])->name('image');
    Route::post('storeImage/', [AdminImageController::class, 'storeImage'])->name('storeImage');
    Route::delete('delete/image/{id}', [AdminImageController::class, 'deleteImage'])->name('deleteImage');

    //Trades Routes
    Route::get('open/trades/history', [AdminTradesController::class, 'openTrades'])->name('trades.open');
    Route::get('close/trades/history', [AdminTradesController::class, 'closeTrades'])->name('trades.close');
    Route::post('set/trade/{id}', [AdminTradesController::class, 'setTrade'])->name('setTrade');
    Route::get('close/trade/{id}', [AdminTradesController::class, 'closeTrade'])->name('closeTrade');


});

