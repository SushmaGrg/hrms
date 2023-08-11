@extends('layouts.app')

@section('content')
    <h2>Reject Leave Application</h2>
    <form action="{{ route('leave.reject', $leave) }}" method="POST">
        @csrf
        @method('PUT') 
        <p>Are you sure you want to reject this leave application?</p>
        <button type="submit" class="btn btn-danger">Reject</button>
    </form>
    <a href="{{ route('leave.index') }}" class="btn btn-secondary">Back</a>
@endsection
