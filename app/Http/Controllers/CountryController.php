<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::all();
        
        $countries = Country::where('name', 'like', "%{$request->search}%")->orWhere('country_code', 'like', "%{$request->search}%")->get();
        
        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        Country::create($request->all());

        return redirect()->route('countries.index')->with('message', 'Country Created Successfully');
    }

    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        
        $country->update($request->all());

        return redirect()->route('countries.index')->with('message', 'Country Updated Successfully');
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')->with('message', 'Country Deleted Successfully');
    }

}
