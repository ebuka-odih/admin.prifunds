<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTradesController extends Controller
{

    public function openTrades()
    {
        $trades = Trade::where('status', 0)->latest()->paginate(10);
        return view('admin.forex.trades', compact('trades'));
    }
    public function closeTrades()
    {
        $trades = Trade::where('status', 1)->latest()->paginate(10);
        return view('admin.forex.close-trades', compact('trades'));
    }

    public function setTrade(Request $request, $id)
    {
        if ($request->close_trade == 'close_trade'){
            $trade = Trade::findOrFail($id);
            $trade->status = 1;
            $trade->percent = 100;
            $trade->profit = $request->profit;
            $trade->save();
            $user = User::findOrFail($trade->user_id);
            $user->profit += $trade->profit;
            $user->save();
            return redirect()->back()->with('closed', "Trade Closed Successfully");
        }
        $trade = Trade::findOrFail($id);
        $trade->profit = $request->profit;
        $trade->percent = $request->percent;
        $trade->save();
        return redirect()->back()->with('updated', "Trade Order Updated Successfully");
    }

}
