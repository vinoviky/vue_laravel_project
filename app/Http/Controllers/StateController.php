<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(Request $request)
    {
        $states = State::all();
        $states = State::where('name', 'like', "%{$request->search}%")->get();
    
        return view('states.index', compact('states'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('states.create', compact('countries'));
    }

   
    public function store(Request $request)
    {
        State::create($request->all());
        return redirect()->route('states.index')->with('message', 'State Created Successfully');
    }

    
    public function edit(State $state)
    {
        $countries = Country::all();
        return view('states.edit', compact('state', 'countries'));
    }

   
    public function update(Request $request, State $state)
    {
        $state->update([
            'country_id' => $request->country_id,
            'name'       => $request->name
        ]);
        return redirect()->route('states.index')->with('message', 'State Updated Successfully');
    }

    
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('message', 'State Deleted Successfully');
    }

}
