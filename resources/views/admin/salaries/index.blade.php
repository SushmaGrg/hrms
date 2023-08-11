@extends('admin.layouts.main')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Salary Records</h1>
      <nav>
        <ol class="breadcrumb d-flex justify-content-between">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li ><a class="breadcrumb-item active" href="{{ route('salaries.create') }}" class="btn btn-primary">Add Salary</a></li>
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
               <div>
                                    @if (session('success'))
                                        <div class="alert alert-success px-2 py-1 ms-3 w-50">
                                            {{ session('success') }}
                                        </div>
                                        <script>
                                            setTimeout(function() {
                                                $('.alert').fadeOut('slow');
                                            }, 5000); // Hide the alert after 5 seconds (5000 milliseconds)
                                        </script>
                                    @endif
                                </div>
        <thead>
            <tr>
                <th>S.N</th>
                <th>User</th>
                <th>Department</th>
                <th>Month</th>
                <th>Year</th>
                <th>Basic Salary</th>
                <th>Leave Deductions</th>
                <th>Total Salary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salaries as $salary)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $salary->user->name }}</td>
                    <td>{{ $salary->department->name }}</td>
                    <td>{{ $salary->month }}</td>
                    <td>{{ $salary->year }}</td>
                    <td>{{ $salary->basic_salary }}</td>
                    <td>{{ $salary->leave_deductions }}</td>
                    <td>{{ $salary->total_salary }}</td>
                    <td>
                                                <a href="{{ route('salaries.show', $salary) }}"
                                                    class="btn fs-5 p-0 text-warning" title="View"><i class="bi bi-eye"></i></a>
                                                <a href="{{ route('salaries.edit', $salary) }}"
                                                    class="btn fs-5 p-0 text-primary" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                <form action="{{ route('salaries.destroy', $salary) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn fs-5 p-0 text-danger" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this department?')"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
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
