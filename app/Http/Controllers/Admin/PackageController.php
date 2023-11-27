<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.transaction.package-invested', compact('packages'));
    }

    public function create()
    {
        $packages = Package::all();
        return view('admin.package.create', compact('packages'));
    }


    public function store(Request $request)
    {
        $data = $this->getData($request);
        Package::create($data);
        return redirect()->back()->with('success', "Package added successfully");
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.package.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        $data = $this->getData($request);
        $package->update($data);
        return redirect()->route('admin.package.create');
    }


    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
        return redirect()->back();
    }

    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'required',
            'min_deposit' => 'required',
            'max_deposit' => 'required',
            'term_days' => 'required',
            'daily_interest' => 'required',
            'tag' => 'nullable',
        ];
        return $request->validate($rules);
    }

}
