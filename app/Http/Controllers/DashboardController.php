<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Notice;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $activeLeaves = Leave::where('status', 'approved')->get();
        $leaves = $activeLeaves->unique('user_id')->count();

        $notices = Notice::all();
        $user = User::all();
        $departments = Department::count();
        $users = User::count();
        // $leaves = Leave::count();
        $noticeCount = Notice::count();
        
        return view('admin.dashboard.dashboard', compact('departments', 'users','user','leaves', 'notices', 'noticeCount'));

    }
  
}
