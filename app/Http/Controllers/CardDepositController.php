<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\PaymentMethod;
use App\Models\User;
use Exception;
use Flutterwave\Payments\Facades\Flutterwave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardDepositController extends Controller
{

    public function cardDeposit()
    {
        $wallets = PaymentMethod::all();
        return view('dashboard.deposit.card-deposit', compact('wallets'));
    }

    public function generatePaymentUrl(Request $request){
        $user = User::findOrFail($request->user_id);

        $payload = [
            "tx_ref" => Flutterwave::generateTransactionReference(),
            "amount" => $request->amount,
            "currency" => "USD",
            "customer" => [
                "email" => $user->email
            ],
            "meta" => [
                "user_id" => $user->id
            ]
        ];

        $payment_link = Flutterwave::render('standard', $payload);
        return redirect($payment_link);

    }

    public function callback()
    {
        $status = request()->status;
        $method = 'flutterwave';
        $transactionID = request()->transaction_id;

        $data = Flutterwave::verifyTransaction($transactionID);

        //if payment is successful
        if ($data['data']) {

            try{
                $payment = $data['data'];

                $user_id = $data['data']['meta']['user_id'];
                $amount = $payment['amount'];
                $reference = "Wallet funding via flutterwave";
                if($payment['status'] == "successful"){
                    $deposit = new Deposit();
                    $deposit->amount = $amount;
                    $deposit->reference = $reference;
                    $deposit->user_id = Auth::id();
                    $deposit->save();
                    return ( new Deposit() )->payment_success($payment, $user_id, $amount, $reference, $method);
                }else{
                    return ( new Deposit() )->payment_failed();
                }
            }
            catch(Exception $e){
                return ( new Deposit() )->payment_failed();
            }
        }
        return ( new Deposit() )->payment_failed();
    }


}
