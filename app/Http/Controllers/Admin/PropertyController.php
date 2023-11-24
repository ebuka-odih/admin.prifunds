<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('admin.property.list', compact('properties'));
    }

    public function create()
    {
        return view('admin.property.create');
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data = Property::create($data);
        return redirect()->route('admin.image', $data->id)->with('success', "Created Successfully");
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('admin.property.show', compact('property'));
    }
    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('admin.property.edit', compact('property'));
    }
    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $data = $this->getData($request);
        $property->update($data);
        return redirect()->route('admin.property.index')->with('updated', "Updated Successfully");
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
        return redirect()->back()->with('deleted', "Deleted Successfully");
    }

    protected function getData(Request $request)
    {
        $rules = [
            'price' => 'required',
            'name' => 'required',
            'type' => 'nullable',
            'min_price' => 'required',
            'return_rate' => 'nullable',
            'capital_back' => 'nullable',
            'return_for' => 'nullable',
            'target_duration' => 'nullable',
            'rooms' => 'nullable',
            'floor' => 'nullable',
            'building_year' => 'nullable',
            'square_meter' => 'nullable',
            'building_location' => 'nullable',
            'description' => 'nullable',
            'reviews' => 'nullable',
            'invested' => 'nullable',
        ];
        return $request->validate($rules);
    }

}
