<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $leaves = [];

if ($user->role === 'admin') {
    $leaves = Leave::all(); // Retrieve all leaves for admin
} else {
    $leaves = $user->leaves ?? collect(); // Retrieve the user's own leave applications
}

return view('admin.leaves.index', compact('leaves', 'user'));
    }

    public function create()
    {
        $user = Auth::user();

        return view('admin.leaves.create', compact('user'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required',
        ]);

        $startDate = Carbon::parse($validatedData['start_date']);
        $endDate = Carbon::parse($validatedData['end_date']);
    
        $totalDays = $startDate->diffInDays($endDate) + 1; // Including both start and end dates

    $leaveData = array_merge($validatedData, ['total_days' => $totalDays]);

    Leave::create($leaveData);
    
        // return redirect()->route('leaves.index')->with('success', 'Leave request submitted successfully');
        return redirect()->back()->with('success', 'Leave request submitted  successfully.');
    }


    public function show(Leave $leave)
    {
        return view('admin.leaves.show', compact('leave'));
        
        
    }

    public function edit(Leave $leave)
    {
        $users = User::all();
        return view('admin.leaves.edit', compact('leave', 'users'));
    }

    public function update(Request $request, Leave $leave)
    {
        $leave->update($request->all());
        return redirect()->route('leaves.index')->with('success', 'Leave updated successfully');
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect()->route('leaves.index')->with('success', 'Leave deleted successfully');
    }

    public function approve(Leave $leave)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Admin can approve leave application
            $leave->status = 'approved';
            $leave->save();

            return redirect()->route('leaves.index')->with('success', 'Leave application approved.');
        }

        return redirect()->route('leaves.index')->with('error', 'You do not have permission to approve leave.');
    }

    public function reject(Leave $leave)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Admin can reject leave application
            $leave->status = 'rejected';
            $leave->save();

            return redirect()->route('leaves.index')->with('success', 'Leave application rejected.');
        }

        return redirect()->route('leaves.index')->with('error', 'You do not have permission to reject leave.');
    }

    
    // public function show(Leave $leave)
    // {
    //     return view('admin.leaves.show', compact('leave'));
    // }

    // public function edit(Leave $leave)
    // {
    //     return view('admin.leaves.edit', compact('leave'));
    // }

    // public function update(Request $request, Leave $leave)
    // {
    //     // Validate the input data
    //     $validatedData = $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'start_date' => 'required|date',
    //         'end_date' => 'required|date|after_or_equal:start_date',
    //         'reason' => 'required',
    //     ]);

    //     // Update the leave application
    //     $leave->update([
    //         'start_date' => $validatedData['start_date'],
    //         'end_date' => $validatedData['end_date'],
    //         'reason' => $validatedData['reason'],
    //         // Other leave data
    //     ]);

    //     return redirect()->route('leaves.index')->with('success', 'Leave application updated successfully.');
    // }

    // public function destroy(Leave $leave)
    // {
    //     $leave->delete();
        
    //     return redirect()->route('leaves.index')->with('success', 'Leave application deleted successfully.');
    // }
}
