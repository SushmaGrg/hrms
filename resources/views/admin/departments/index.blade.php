@extends('admin.layouts.main')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Departments</h1>
            <nav>
                <ol class="breadcrumb d-flex justify-content-between">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a class="breadcrumb-item active" href="{{ route('departments.create') }}" class="btn btn-primary">Add
                            Department</a></li>
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
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $department)
                                        <tr>
                                                               <td>{{ $loop->iteration}}</td>
                                            <td>{{ $department->name }}</td>
                                            <td>
                                                <a href="{{ route('departments.show', $department) }}"
                                                    class="btn fs-5 p-0 text-warning" title="View"><i class="bi bi-eye"></i></a>
                                                <a href="{{ route('departments.edit', $department) }}"
                                                    class="btn fs-5 p-0 text-primary" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                <form action="{{ route('departments.destroy', $department) }}"
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
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
