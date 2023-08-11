@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit User Profile</h1>
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
                    <div class="card-body">
                        <h5 class="card-title"></h5>
    <form class="row g-3" action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <label for="name">Name</label>

            <input type="text" id="name" class="form-control" name="name" placeholder="Your Name" value="{{ $user->name }}" required>
            @error('name')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            @error('email')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" class="form-control" name="phone" placeholder="Phone" value="{{$user->phone}}">
            @error('phone')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <label for="address">Address</label>
            <input type="text" id="address" class="form-control" name="address" placeholder="Address" value="{{$user->address}}">
            @error('address')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" id="department_id" class="form-control">
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $user->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <label for="job">Job</label>
            <input type="text" id="job" class="form-control" name="job" placeholder="Job" value="{{$user->job}}">
            @error('job')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <label for="hired_date">Hired Date</label>
            <input type="date" id="hired_date" class="form-control" name="hired_date" placeholder="Hired Date" value="{{$user->hired_date}}">
            @error('hired_date')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <label for="salary">Salary</label>
            <input type="number" id="salary" class="form-control" name="salary" placeholder="Salary" value="{{$user->salary}}">
            @error('salary')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role">
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="employee" {{ $user->role === 'employee' ? 'selected' : '' }}>Employee</option>
            </select>
        </div>
        <div class="col-md-12">
            <label for="photo">Photo</label>
            <input type="file" id="photo" class="form-control" name="photo" placeholder="Photo">
            @error('photo')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection




