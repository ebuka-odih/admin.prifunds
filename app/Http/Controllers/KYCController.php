<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KYCController extends Controller
{
    public function kyc()
    {
        return view('dashboard.kyc');
    }

    public function storeKyc(Request $request)
    {
        $rules = $request->validate([
            'id_type' => 'required',
            'id_front_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_back_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_of_birth' => 'required',
            'country' => 'required',
            'state' => 'nullable',
            'city' => 'nullable',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ]);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $input1['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $input1['imagename']);
        }
        if ($request->hasFile('id_front_img')) {
            $image = $request->file('id_front_img');
            $input2['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $input2['imagename']);
        }
        // Upload and store the second image
        if ($request->hasFile('id_back_img')) {
            $image = $request->file('id_back_img');
            $input3['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $input3['imagename']);
        }
        $kyc = User::findOrFail(auth()->id());
        $kyc->avatar = $input1['imagename'];
        $kyc->id_front_img = $input2['imagename'];
        $kyc->id_back_img = $input3['imagename'];
        $kyc->update($rules);
        return redirect()->route('user.dashboard')->with('success', "kYC submitted");
    }
}
