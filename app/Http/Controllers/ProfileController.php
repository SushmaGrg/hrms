<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.users.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($user);
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
    
        return redirect()->route('profile.index')->with('success', 'User updated successfully.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
   
}
