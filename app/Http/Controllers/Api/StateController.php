<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $state = State::with('country')->get();
        return $state;
    }

    public function countries()
    {
        $countries = Country::all();
        return $countries;
    }

    public function store(Request $request)
    {
        $state = State::create($request->all());

        return ($state);
    }

    public function show(State $state)
    {
        
        return ($state);
    }

    public function update(Request $request, State $state)
    {
        $state->update($request->all());
    }

    public function destroy(State $state)
    {
        $state->delete();

        return response()->json('State Deleted Successfully');
    }
}
