<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::all();
        $departments = Department::where('name', 'like', "%{$request->search}%")->get();
        
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        Department::create($request->all());

        return redirect()->route('departments.index')->with('message', 'Department Created Successfully');
    }


    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    
    public function update(Request $request, Department $department)
    {
        $department->update([
            'name' => $request->name
        ]);

        return redirect()->route('departments.index')->with('message', 'Department Updated Successfully');
    }

   
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')->with('message', 'Department Deleted Successfully');
    }

}
