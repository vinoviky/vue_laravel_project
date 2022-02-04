<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
   
    public function index(Request $request)
    {
        $cities = City::all();
       
        $cities = City::where('name', 'like', "%{$request->search}%")->get();
        

        return view('citiess.index', compact('cities'));
    }

    
    public function create()
    {
        $states = State::all();

        return view('citiess.create', compact('states'));
    }

    public function store(Request $request)
    {
        City::create($request->all());

        return redirect()->route('citiess.index')->with('message', 'City Created Successfully');
    }

    
    public function edit(City $city)
    {
        $states = State::all();
        return view('citiess.edit', compact('city', 'states'));
    }

    public function update(Request $request, City $city)
    {
        $city->update([
            'state_id' => $request->state_id,
            'name'     => $request->name
        ]);
        return redirect()->route('citiess.index')->with('message', 'City Updated Successfully');
    }

   
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('citiess.index')->with('message', 'City Deleted Successfully');
    }
}
