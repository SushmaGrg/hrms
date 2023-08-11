<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use PDF;

class UserController extends Controller
{
    public function index()
{
    $users = User::with('department')->get();
    return view('admin.users.index', compact('users'));
    
}

public function create()
{
    $departments = Department::all();
    return view('admin.users.create', compact('departments'));
}

// public function store(Request $request)
// {
//     User::create($request->all());
//     return redirect()->route('users.index')->with('success', 'User created successfully');
// }
public function store(Request $request)
{
    // dd($request->all());
    $request->validate([
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email|unique:users',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'job' => 'required',
        'hired_date' => 'required|date',
        'salary' => 'required|numeric',
        'department_id' => 'required',
        'password' => 'required|min:6',
        'role' => 'required|in:admin,employee',
    ]);

    $data = $request->except(['photo']);
    $data['password'] = Hash::make($data['password']);
    $user = User::create($data);

    // $user->assignRole($request->input('role'));

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
        $user->photo = $photoPath;
        $user->save();
    }

    return redirect()->route('users.index')->with('success', 'User created successfully.');
}


public function show(User $user)
{
    $departments = Department::all();
    return view('admin.users.show', compact('user', 'departments'));
}

public function edit(User $user)
{
    $departments = Department::all();
    return view('admin.users.edit', compact('user', 'departments'));
}

public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'job' => 'required',
        'hired_date' => 'nullable|date',
        // 'hired_date' => 'required|date',
        // 'salary' => 'required|numeric',
        'salary' => 'nullable|numeric',
        'department_id' => 'nullable',
        'password' => 'nullable|min:6',
        'role' => 'nullable|in:admin,employee',
    ]);

    $data = $request->except(['photo']);

    if ($request->has('password')) {
        $data['password'] = Hash::make($data['password']);
    }

    $user->update($data);

    if ($request->hasFile('photo')) {
        // Delete previous photo
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $photoPath = $request->file('photo')->store('photos', 'public');
        $user->photo = $photoPath;
        $user->save();
    }

    // $user->syncRoles([$request->input('role')]);

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}

public function destroy(User $user)
{
    $user->delete();
    return redirect()->route('users.index')->with('success', 'User deleted successfully');
}


public function export_users_pdf()
{
    $users = User::get();
        $pdf = PDF::loadView('pdf.users', compact('users'));
return $pdf->stream('users.pdf');
        // return $pdf->download('users.pdf');
    
}

}
