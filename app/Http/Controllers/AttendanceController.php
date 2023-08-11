<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $attendanceHistory = Attendance::where('user_id', $user_id)->orderBy('date', 'desc')->get();
    
        return view('admin.attendance.index', compact('attendanceHistory'));
    }
    public function create()
    {
        return view('admin.attendance.create');
    }
    
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $date = now()->toDateString();

        // Check if the user has already marked attendance for the day
        $existingAttendance = Attendance::where('user_id', $user_id)
            ->where('date', $date)
            ->first();

        if ($existingAttendance) {
            return redirect()->back()->with('error', 'Attendance already marked for today.');
        }

        $status = $request->input('status');

        Attendance::create([
            'user_id' => $user_id,
            'date' => $date,
            'status' => $status,
        ]);

        return redirect()->back()->with('success', 'Attendance marked successfully.');
    }
    
}



  
