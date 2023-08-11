@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create Department</h1>
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
    <form action="{{ route('users.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
       
        <div class="col-md-12">
            <input type="text" class="form-control" name="name" placeholder="Name" required>
            @error('name')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <input type="email" class="form-control" name="email" placeholder="Email Address">
            @error('email')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <input type="password" class="form-control" name="password" placeholder="Password">
            @error('password')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <input type="tel" class="form-control" name="phone" placeholder="Phone">
            @error('phone')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <input type="text" class="form-control" name="address" placeholder="Address">
            @error('address')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <select name="department_id" id="department_id" class="form-control">
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <input type="text" class="form-control" name="job" placeholder="Job">
            @error('job')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <input type="date" class="form-control" name="hired_date" placeholder="Hired Date">
            @error('hired_date')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <input type="number" class="form-control" name="salary" placeholder="Salary">
            @error('salary')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <select class="form-control" id="role" name="role" >
                <option value="">--Select Role--</option>
                <option value="admin">Admin</option>
                <option value="employee">Employee</option>
            </select>
        </div>
        <div class="col-md-12">
            <input type="file" class="form-control" name="photo" placeholder="Photo">
            @error('photo')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
         <div class="text-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div> 
    </form>
@endsection

