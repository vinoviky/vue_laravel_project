<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Http\Resources\CountrySingleResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return CountryResource::collection($countries);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $country = Country::create($request->all());

        return response()->json($country);
    }

    public function show(Country $country)
    {
        return new CountrySingleResource($country);
    }

    public function update(Request $request, Country $country)
    {
        $country->update($request->all());
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return response()->json('Country Deleted Successfully');
    }
}
