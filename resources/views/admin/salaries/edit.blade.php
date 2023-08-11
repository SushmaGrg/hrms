@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Salary Record</h1>
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
    <form class="row g-3" action="{{ route('salaries.update', $salary) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <select class="form-control" name="user_id" id="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $salary->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <select name="department_id" class="form-control" id="department_id">
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $department->id == $salary->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <input type="number" class="form-control" name="month" placeholder="Month" value="{{ $salary->month }}" min="1" max="12">
            @error('month')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <input type="number" class="form-control" name="year" placeholder="Year" value="{{ $salary->year }}" min="2000">
            @error('year')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <input type="number" class="form-control" name="basic_salary" placeholder="Basic Salary" value="{{ $salary->basic_salary }}" step="0.01">
            @error('basic_salary')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <input type="number" class="form-control" name="leave_deductions" placeholder="Leave Deductions" value="{{ $salary->leave_deductions }}" step="0.01">
            @error('leave_deductions')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
           
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div> 
    </form>
</div>
</div>

</div>
</section>

</main><!-- End #main -->
@endsection

