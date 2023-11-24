<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\TradeStock;
use Illuminate\Http\Request;

class AdminStockController extends Controller
{
    public function index()
    {
        $stocks = TradeStock::all();
        return view('admin.stock.invested', compact('stocks'));
    }

    public function create()
    {
        $stocks = Stock::all();
        return view('admin.stock.create', compact('stocks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'min_price' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
        $data = new Stock();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $input['imagename']);

            $data->name = $request->name;
            $data->min_price = $request->min_price;
            $data->description = $request->description;
            $data->image = $input['imagename'];
            $data->save();
            return redirect()->back()->with('success', 'Created Successfully');
        }
        $data->name = $request->name;
        $data->min_price = $request->min_price;
        $data->description = $request->description;
        $data->save();
        return redirect()->back()->with('success', 'Created Successfully');
    }

}
