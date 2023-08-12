@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create Salary Record</h1>
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
                        <form class="row g-3" action="{{ route('salaries.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <select class="form-control" name="user_id" id="user_id">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="department_id" id="department_id">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <input class="form-control"  type="number" name="month" min="1" max="12" placeholder="Month">
                                @error('month')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                            </div>
                            <div class="col-md-12">
                                <input class="form-control"  type="number" name="year" min="2000" placeholder="Year">
                                @error('year')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="number" name="basic_salary" step="0.01" placeholder="Basic Salary" value="{{ $user->basic_salary ?? "" }}">
                                @error('basic_salary')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-12">
                                <input class="form-control"  type="number" name="leave_deductions" placeholder="Leave Deductions" step="0.01">
                                @error('leave_deductions')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                            </div>
                            
                           <div class="text-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div> 
                        </form>

                    </div>
                </div>

            </div>
        </section>

    </main><!-- End #main -->
@endsection
