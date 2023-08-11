@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Department</h1>
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
                        <h5 class="card-title">{{ $department->name }}</h5>
                        <!-- Display other department details here -->
                        <a href="{{ route('departments.edit', $department) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('departments.destroy', $department) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                        </form>
                    </div>
                </div>

            </div>
        </section>

    </main><!-- End #main -->
@endsection

