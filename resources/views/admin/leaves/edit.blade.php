@extends('layouts.app')

@section('content')
    <h2>Edit Leave Request</h2>
    <form action="{{ route('leaves.update', ['leave' => $leave->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $leave->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $leave->start_date }}" required>
            @error('start_date')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $leave->end_date }}" required>
            @error('end_date')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="form-group">
            <label for="reason">Reason</label>
            <textarea name="reason" id="reason" class="form-control" rows="4" required>{{ $leave->reason }}</textarea>
            @error('reason')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    
@endsection
