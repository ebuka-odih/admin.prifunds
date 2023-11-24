<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use App\Models\TradeStock;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function stockHistory()
    {
        $stock = TradeStock::whereUserId(auth()->id())->get();
        return view('dashboard.history.stock-history', compact('stock'));
    }

    public function forexHistory()
    {
        $forex = Trade::whereUserId(auth()->id())->get();
        return view('dashboard.history.forex-history', compact('forex'));
    }
}
