@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Mark Attendance</h1>
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

    <form class="row g-3" method="POST" action="{{ route('attendance.store') }}">
        @csrf
         <div class="col-md-12">
        <label for="status">Attendance Status:</label>
        <select name="status" id="status"  class="form-control">
            <option value="present">Present</option>
            <option value="absent">Absent</option>
            <option value="late">Late</option>
        </select>
         @error('status')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
        </div>
        <div class="text-center">
                                <button type="submit" class="btn btn-success">Mark Attendance</button>
                            </div> 
    </form>
      </div>
                </div>

            </div>
        </section>

    </main><!-- End #main -->
@endsection
