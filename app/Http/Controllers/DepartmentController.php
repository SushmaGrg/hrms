<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:departments|max:255',
            // Add more validation rules for other fields
        ]);

        Department::create($validatedData);

        return redirect()->route('departments.index')
            ->with('success', 'Department created successfully');
    }

    public function show(Department $department)
    {
        return view('admin.departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:departments,name,' . $department->id . '|max:255',
            // Add more validation rules for other fields
        ]);

        $department->update($validatedData);

        return redirect()->route('departments.index')
            ->with('success', 'Department updated successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')
            ->with('success', 'Department deleted successfully');
    }
}
