<?php

namespace App\Http\Controllers;

use App\Mail\AdminWithdrawAlert;
use App\Mail\RequestWithdraw;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WithdrawController extends Controller
{
    public function withdraw()
    {
        $user = Auth::user();
        return view('dashboard.withdraw.withdraw', compact('user'));
    }

    public function processWithdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'bank' => 'nullable',
            'acct_name' => 'nullable',
            'acct_num' => 'nullable',
            'swift_code' => 'nullable',
            'withdrawal_method' => 'nullable',
            'usdt_wallet' => 'nullable',
            'btc_address' => 'nullable',
            'eth_address' => 'nullable',
        ]);
        $withdraw = new Withdraw();
        if ($request->amount < \auth()->user()->balance || $request->amount < \auth()->user()->profit){
            if ($request->amount >= 50){
                $withdraw->user_id = Auth::id();
                $withdraw->amount = $request->amount;
                $withdraw->withdrawal_method = $request->withdrawal_method;
                $withdraw->bank = $request->bank;
                $withdraw->acct_name = $request->acct_name;
                $withdraw->acct_num = $request->acct_num;
                $withdraw->swift_code = $request->swift_code;

                $withdraw->usdt_address = $request->usdt_address;
                $withdraw->btc_address = $request->btc_address;
                $withdraw->eth_address = $request->eth_address;
                $user = User::findOrFail($withdraw->user_id);
                $data = ['withdraw' => $withdraw, 'user' => $user];
                $withdraw->save();
                Mail::to($user->email)->send(new RequestWithdraw($data));
                Mail::to(env('MAIL_FROM_NAME'))->send( new AdminWithdrawAlert($data));
                return redirect()->route('user.withdrawStatus', $withdraw->id);
            }
            return redirect()->back()->with('error', "You can't withdraw less than 50 ".\auth()->user()->currency);
        }
        return redirect()->back()->with('error', "Insufficient Balance");

    }

    public function withdrawStatus($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        return view('dashboard.withdraw.status', compact('withdraw'));
    }

}
