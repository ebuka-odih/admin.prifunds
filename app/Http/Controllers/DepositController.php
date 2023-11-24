<?php

namespace App\Http\Controllers;

use App\Mail\AdminDepositAlert;
use App\Models\Deposit;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use ProtoneMedia\Splade\Facades\Splade;

class DepositController extends Controller
{
    public function depositHistory()
    {
        $deposits = Deposit::whereUserId(\auth()->id())->get();
        return view('dashboard.deposit.deposit-history', compact('deposits'));
    }

    public function deposit(Request $request)
    {
        return view('dashboard.deposit.deposit');
    }

    public function depositMethod(Request $request)
    {
        if ($request->deposit_method == 'crypto'){
            $wallets = PaymentMethod::all();
            return view('dashboard.deposit.crypto', compact('wallets'));

        }elseif ($request->deposit_method == 'card'){
            return view('dashboard.deposit.card');
        }elseif ($request->deposit_method == 'bank'){
            return view('dashboard.deposit.bank');
        }
        return redirect()->back();
    }

    public function fetchWalletAddress($paymentMethodId) {
        $paymentMethod = PaymentMethod::find($paymentMethodId);

        if ($paymentMethod) {
            return response()->json(['value' => $paymentMethod->value]);
        } else {
            return response()->json(['error' => 'Payment Method not found'], 404);
        }
    }

    public function cryptoDeposit(Request $request)
    {
        $request->validate([
                'reference' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
            ]
        );

        $deposit = new Deposit();

        if ($request->hasFile('reference')){
            $image = $request->file('reference');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/proof');
            $image->move($destinationPath, $input['imagename']);

            $deposit->user_id = Auth::id();
            $deposit->amount = $request->input('amount');
            $deposit->payment_method_id = $request->input('payment_method_id');
            $deposit->reference = $input['imagename'];
            $deposit->save();
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new AdminDepositAlert($formData));
            return redirect()->route('user.status', $deposit->id);
        }
        return redirect()->back()->with('declined', "Please Upload Your Payment Screenshot ");
    }

    public function status($id)
    {
        $deposit = Deposit::findOrFail($id);
        return view('dashboard.deposit.status', compact('deposit'));
    }



}
