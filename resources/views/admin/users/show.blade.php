@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>User Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item active">Add</li> --}}
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
    <div class="card">
        <div class="card-body p-2">
            <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}'s Profile Image" width="100">
            <h5 class="card-title">{{ $user->name }}</h5>
            {{-- <p class="card-text">ID: {{ $user->id }}</p> --}}
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Phone: {{ $user->phone }}</p>
            <p class="card-text">Address: {{ $user->address }}</p>
            <p class="card-text">Department: {{ $user->department ? $user->department->name : 'N/A' }}</p>
            <p class="card-text">Role: {{ $user->role }}</p>
            <p class="card-text">Salary: {{ $user->salary }}</p>
            <p class="card-text">Hired Date: {{ $user->hired_date }}</p>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-primary">Edit</a>
            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
</section>

</main><!-- End #main -->
@endsection
