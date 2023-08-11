<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with(['user', 'department'])->get();
        return view('admin.salaries.index', compact('salaries'));
    }

    public function create()
    {
        $users = User::all();
        $departments = Department::all();
        return view('admin.salaries.create', compact('users', 'departments'));
    }


    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:2000',
            'basic_salary' => 'required|numeric|min:0',
            'leave_deductions' => 'required|numeric|min:0',
            // Add more validation rules as needed
        ]);

        // Calculate total salary
        $totalSalary = $validatedData['basic_salary'] - $validatedData['leave_deductions'];
  // Create the salary record
  Salary::create([
    'user_id' => $validatedData['user_id'],
    'department_id' => $validatedData['department_id'],
    'month' => $validatedData['month'],
    'year' => $validatedData['year'],
    'basic_salary' => $validatedData['basic_salary'],
    'leave_deductions' => $validatedData['leave_deductions'],
    'total_salary' => $totalSalary,
]);

return redirect()->route('salaries.index')->with('success', 'Salary record added successfully');
}

public function show(Salary $salary)
{
    return view('admin.salaries.show', compact('salary'));
}

public function edit(Salary $salary)
{
    $users = User::all();
    $departments = Department::all();
    return view('admin.salaries.edit', compact('salary', 'users', 'departments'));
}

public function update(Request $request, Salary $salary)
{
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'department_id' => 'required|exists:departments,id',
        'month' => 'required|integer|min:1|max:12',
        'year' => 'required|integer|min:2000',
        'basic_salary' => 'required|numeric|min:0',
        'leave_deductions' => 'required|numeric|min:0',
    ]);

    $totalSalary = $validatedData['basic_salary'] - $validatedData['leave_deductions'];

    $salary->update([
        'user_id' => $validatedData['user_id'],
        'department_id' => $validatedData['department_id'],
        'month' => $validatedData['month'],
        'year' => $validatedData['year'],
        'basic_salary' => $validatedData['basic_salary'],
        'leave_deductions' => $validatedData['leave_deductions'],
        'total_salary' => $totalSalary,
    ]);

    return redirect()->route('salaries.index')->with('success', 'Salary record updated successfully');
}


public function destroy(Salary $salary)
{
    $salary->delete();
    return redirect()->route('salaries.index')->with('success', 'Salary record deleted successfully');
}

}
