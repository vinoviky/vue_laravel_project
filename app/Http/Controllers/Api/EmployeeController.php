<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeSingleResource;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use App\Models\State;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function countries()
    {
        $countries = Country::all();

        return response()->json($countries);
    }

    public function states(Country $country)
    {
        return response()->json($country->states);
    }
    public function cities(State $state)
    {
        return response()->json($state->cities);
    }
    public function departments()
    {
        $departments = Department::all();

        return response()->json($departments);
    }

    public function index(Request $request)
    {
        $employees = Employee::all();

        return EmployeeResource::collection($employees);
    }

    public function store(Request $request)
    {
        $employee = Employee::create($request->all());

        return response()->json($employee);
    }

    
    public function show(Employee $employee)
    {
        return new EmployeeSingleResource($employee);
    }

    
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json('Employee Deleted Successfully');
    }

}
