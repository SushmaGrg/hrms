@extends('admin.layouts.main')
@section('content')


<main id="main" class="main">
  @if(session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if(session('status'))
  <div class="alert alert-success">{{ session('status') }}</div>
@endif
    <div class="pagetitle">
      <h1>Attendance History</h1>
      <nav>
        <ol class="breadcrumb d-flex justify-content-between">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li ><a class="breadcrumb-item active" href="{{ route('attendance.create') }}" class="btn btn-primary">Add Attendance</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
               
              <!-- Table with stripped rows -->
              <table class="table datatable">
        <thead>
            <tr>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendanceHistory as $attendance)
                <tr>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

</div>
</div>
</section>

</main><!-- End #main -->

@endsection
