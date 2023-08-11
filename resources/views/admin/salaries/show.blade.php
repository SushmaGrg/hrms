@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Salary Details</h1>
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
    <p><strong>ID:</strong> {{ $salary->id }}</p>
    <p><strong>User:</strong> {{ $salary->user->name }}</p>
    <p><strong>Department:</strong> {{ $salary->department->name }}</p>
    <p><strong>Month:</strong> {{ $salary->month }}</p>
    <p><strong>Year:</strong> {{ $salary->year }}</p>
    <p><strong>Basic Salary:</strong> {{ $salary->basic_salary }}</p>
    <p><strong>Leave Deductions:</strong> {{ $salary->leave_deductions }}</p>
    <p><strong>Total Salary:</strong> {{ $salary->total_salary }}</p>
    <a href="{{ route('salaries.edit', $salary) }}" class="btn btn-outline-primary">Edit</a>
    <form action="{{ route('salaries.destroy', $salary) }}" method="POST" class="d-inline">
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
