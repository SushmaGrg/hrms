@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Leave Apply</h1>
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
                         @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form class="row g-3" action="{{ route('leaves.store') }}" method="POST">
        @csrf
        <div class="col-md-12">

            <select name="user_id" id="user_id" class="form-control">
                <option value="">--Select User--</option>
                    <option value="{{Auth::user()->id}}"> {{Auth::user()->name}}</option>
            </select>
        </div>
        <div class="col-md-12">
            <input type="date" name="start_date" placeholder="Start Date" class="form-control" required>
            @error('start_date')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <input type="date" name="end_date" placeholder="End Date" class="form-control" required>
            @error('end_date')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <textarea name="reason" placeholder="Reason" class="form-control" rows="4" required></textarea>
            @error('reason')
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
