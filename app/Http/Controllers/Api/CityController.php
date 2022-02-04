<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $city = City::with('state')->get();
        return $city;
    }

    public function states()
    {
        $states = State::all();
        return $states;
        // return response()->json($states);
    }

    public function store(Request $request)
    {
        $city = City::create($request->all());

        return ($city);
    }

    public function show(City $city)
    {
        
        return ($city);
    }

    public function update(Request $request, City $city)
    {
        $city->update($request->all());
    }

    public function destroy(City $city)
    {
        $city->delete();

        return response()->json('City Deleted Successfully');
    }

}
