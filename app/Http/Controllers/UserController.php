<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\TradeProperty;
use App\Models\TradeStock;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $stock = TradeStock::whereUserId(\auth()->id())->select('amount')->sum('amount');
        $r_estate = TradeProperty::whereUserId(\auth()->id())->select('amount')->sum('amount');
        $asset = $stock + $r_estate;
        $deposit = Deposit::whereUserId(\auth()->id())->select('amount')->sum('amount');
        $withdrawal = Withdraw::whereUserId(\auth()->id())->select('amount')->sum('amount');
        return view('dashboard.index', compact('user', 'deposit', 'asset', 'withdrawal'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.user.profile', compact('user'));
    }

    public function setting()
    {
        $user = Auth::user();
        return view('dashboard.user.setting', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(auth()->id());
        $data = $this->getData($request);
        $user->update($data);
        return redirect()->back()->with('success', 'Profile Updated Successful');
    }
    protected function getData(Request $request){
        $rules = [
            'name' => 'nullable',
            'email' => 'nullable',
            'date_of_birth' => 'nullable',
            'country' => 'nullable',
            'state' => 'nullable',
            'address' => 'nullable',
            'phone' => 'nullable',
            'gender' => 'nullable',
        ];
        return $request->validate($rules);
    }

    public function security()
    {
        $user = Auth::user();
        return view('dashboard.user.security', compact('user'));
    }

    public function changePasswordSave(Request $request)
    {

        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);
        $auth = Auth::user();

        // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password))
        {
            return back()->with('error', "Current Password is Invalid");
        }

        if (strcmp($request->get('current_password'), $request->new_password) == 0)
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return back()->with('success', "Password Changed Successfully");
    }


}
