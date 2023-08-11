@extends('layouts.app')

@section('content')
    <h2>Leave Request Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">User: {{  $leave->user ? $leave->user->name : 'N/A'  }}</h5>
            <p class="card-text">Start Date: {{ $leave->start_date }}</p>
            <p class="card-text">End Date: {{ $leave->end_date }}</p>
            <p class="card-text">Total Dates: {{ $leave->total_dates }}</p>
            <p class="card-text">Status: {{ $leave->status }}</p>
            <p class="card-text">Reason: {{ $leave->reason }}</p>
            <a href="{{ route('leaves.edit',  $leave) }}" class="btn btn-outline-primary">Edit</a>
            
            <form action="{{ route('leaves.destroy', $leave) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
