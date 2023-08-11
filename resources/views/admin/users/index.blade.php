@extends('admin.layouts.main')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Employees</h1>
            <nav>
                <ol class="breadcrumb d-flex justify-content-between">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a class="breadcrumb-item active" href="{{ route('users.create') }}" class="btn btn-primary">Add
                            Employees/Users</a>
                            </li>
                </ol>
                 <a class="btn btn-success" href="{{ route('export_users_pdf') }}" class="btn btn-primary">Export PDF</a>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <table class="table ">
                            {{-- <table class="table datatable "> --}}
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
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Job</th>
                                    <th>Hired Date</th>
                                    <th>Salary</th>
                                    <th>Role</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if ($users)
                                        @foreach ($users as $user)
                                            <tr>
                    <td>{{ $loop->iteration}}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->department->name ?? 'N/A' }}</td>
                                                <td>{{ $user->job }}</td>
                                                <td>{{ $user->hired_date }}</td>
                                                <td>{{ $user->salary }}</td>
                                                <td>
                                                @if($user->role == "admin")
                                                <span class="badge bg-warning ">{{ $user->role }}</span>
                                                @else
                                                <span class="badge bg-secondary ">{{ $user->role }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($user->photo)
                                                        <img src="{{ asset('storage/' . $user->photo) }}"
                                                            alt="{{ $user->name }}" width="50">
                                                    @else
                                                        No Photo
                                                    @endif
                                                </td>
                                                <td >
                                                <a href="{{ route('users.show', $user) }}"
                                                    class="btn fs-5 p-0 text-warning" title="View"><i class="bi bi-eye"></i></a>
                                                <a href="{{ route('users.edit', $user) }}"
                                                    class="btn fs-5 p-0 text-primary" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                <form action="{{ route('users.destroy', $user) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn fs-5 p-0 text-danger" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this department?')"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>

                         
                        </div>
                      </div>
  
                  </div>
              </div>
              </div>
          </section>
  
      </main><!-- End #main -->
  @endsection
