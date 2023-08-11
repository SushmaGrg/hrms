@extends('layouts.app')

@section('content')
    <h2>Approve Leave Application</h2>
    <form action="{{ route('leave.approve', $leave) }}" method="POST">
        @csrf
        @method('PUT') 
        <button type="submit" class="btn btn-success">Approve</button>
    </form>
    <a href="{{ route('leave.index') }}" class="btn btn-secondary">Back</a>
@endsection
