@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create Notices</h1>
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

                        <form class="row g-3" action="{{ route('notices.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="title" placeholder="Title">
                                @error('title')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="content" placeholder="Content">
                                @error('content')
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
