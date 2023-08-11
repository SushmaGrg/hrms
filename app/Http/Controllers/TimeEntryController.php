<?php

namespace App\Http\Controllers;

use App\Models\TimeEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class TimeEntryController extends Controller
{
    public function store()
    {
    //     $user = auth()->user();
    //     $timeEntry = new TimeEntry([
    //         'start_time' => Carbon::now(),
    //     ]);
    //     $user->timeEntries()->save($timeEntry);

    //     return redirect('/time-entries'); // Redirect to the listing page
    $user = auth()->user();

    // Check if there's an ongoing time entry for the user
    $ongoingEntry = $user->timeEntries()->whereNull('end_time')->first();
    if ($ongoingEntry) {
        return redirect()->back()->with('error', 'You must end the previous time entry before starting a new one.');
    }

    // Create a new time entry
    $newEntry = new TimeEntry();
    $newEntry->user_id = $user->id;
    $newEntry->start_time = now();
    $newEntry->save();

    return redirect()->back()->with('success', 'Time entry started successfully.');
}

    
    public function update(TimeEntry $timeEntry)
    {
        // // dd('Update End called', $timeEntry);
        // $timeEntry->update([
        //     'end_time' => now(),
        //     // 'end_time' => Carbon::now(),
        // ]);
        

        // return redirect('/time-entries'); // Redirect to the listing page

    $user = auth()->user();

    // Find the ongoing time entry for the user
    $ongoingEntry = $user->timeEntries()->whereNull('end_time')->first();
    if ($ongoingEntry) {
        $ongoingEntry->end_time = now();
        $ongoingEntry->save();
        return redirect()->back()->with('success', 'Time entry ended successfully.');
    } else {
        return redirect()->back()->with('error', 'No ongoing time entry found.');
    }
}

    
    public function index()
    {
        $user = auth()->user();
        $timeEntries = $user->timeEntries;

        return view('admin.time-entries.index', compact('timeEntries'));
    }
}

