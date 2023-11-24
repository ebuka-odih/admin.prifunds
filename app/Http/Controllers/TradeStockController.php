<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\TradeStock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TradeStockController extends Controller
{
    public function stock()
    {
        $stocks = Stock::all();
        return view('dashboard.stock.list', compact('stocks'));
    }

    public function tradeStock($id)
    {
        $user = Auth::user();
        $stock = Stock::findOrFail($id);
        return view('dashboard.stock.trade-stock', compact('stock', 'user'));
    }

    public function processTrade(Request $request)
    {
        $id = $request->stock_id;
        $stock = Stock::findOrFail($id);
        if ($request->amount >= $stock->min_price){
            $trade = new TradeStock();
            $trade->amount = $request->amount;
            $trade->user_id = Auth::id();
            $trade->stock_id = $request->stock_id;
            $trade->status = 0;
            $trade->save();
            $user = User::findOrFail($trade->user_id);
            $user->balance -= $request->amount;
            $user->save();
            return redirect()->route('user.stockSuccess', $trade->id);
        }
        return redirect()->back()->with('error', 'Declined, enter minimum amount or higher');
    }

    public function stockSuccess($id)
    {
        $trade = TradeStock::findOrFail($id);
        return view('dashboard.stock.trade-status', compact('trade'));
    }

}
