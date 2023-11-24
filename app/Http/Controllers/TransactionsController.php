<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function depositHistory()
    {
        $deposits = Deposit::whereUserId(auth()->id())->latest()->get();
        return view('dashboard.transaction.deposit-history', compact('deposits'));
    }

    public function withdrawHistory()
    {
        $withdraw = Withdraw::whereUserId(auth()->id())->latest()->get();
        return view('   dashboard.transaction.withdraw-history', compact('withdraw'));
    }

}
