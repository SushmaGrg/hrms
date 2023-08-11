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
                        <h5 class="card-title"></h5>

                        <!-- No Labels Form -->
                        <form class="row g-3" action="{{ route('departments.update',  $department) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{ $department->name }}" required>
                                @error('name')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div> 
                        </form><!-- End No Labels Form -->

                    </div>
                </div>

            </div>
        </section>

    </main><!-- End #main -->
@endsection

