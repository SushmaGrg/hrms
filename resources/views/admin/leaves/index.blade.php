@extends('admin.layouts.main')
@section('content')


    <main id="main" class="main">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="pagetitle">
            <h1>Leaves</h1>
            <nav>
                <ol class="breadcrumb d-flex justify-content-between">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a class="breadcrumb-item active" href="{{ route('leaves.create') }}" class="btn btn-primary">Add
                            Leave</a></li>
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
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Total Days</th>
                                        <th>Status</th>
                                        @if (Auth::user()->role === 'admin')
                                            <th>Accept/Reject</th>
                                        @endif
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @if ($leaves->isEmpty())
                                    <p>No leave applications found.</p>
                                @else
                                    {{-- @if (Auth::user() == 'admin') --}}
                                    <tbody>

                                        @foreach ($leaves as $leave)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $leave->user ? $leave->user->name : 'N/A' }}</td>
                                                <td>{{ $leave->start_date }}</td>
                                                <td>{{ $leave->end_date }}</td>
                                                <td>{{ $leave->total_days }}</td>
                                                {{-- <td>{{ $leave->status }}</td> --}}
                                                <td>
                                                    @if ($leave->status == 'approved')
                                                        <span class="badge bg-success ">{{ $leave->status }}</span>
                                                    @elseif($leave->status == 'pending')
                                                        <span class="badge bg-warning ">{{ $leave->status }}</span>
                                                    @else
                                                        <span class="badge bg-danger ">{{ $leave->status }}</span>
                                                    @endif
                                                </td>
                                                @if (Auth::user()->role === 'admin')
                                                    <td class="">
                                                        <form class=" d-inline"
                                                            action="{{ route('leaves.approve', ['leave' => $leave]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn p-0 fs-3 text-success"
                                                                title="Approve"
                                                                onclick="return confirm('Are you sure you want to approve this leave?')"><i
                                                                    class="bi bi-check-lg"></i></button>
                                                        </form>
                                                        <form class="d-inline"
                                                            action="{{ route('leaves.reject', ['leave' => $leave]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="btn p-0 fs-3 text-danger" type="submit"
                                                                title="Reject"
                                                                onclick="return confirm('Are you sure you want to reject this leave?')"><i
                                                                    class="bi bi-x-lg"></i></button>
                                                        </form>
                                                    </td>
                                                @endif

                                                <td>

                                                    <a href={{ route('leaves.show', ['leave' => $leave->id]) }}
                                                        class="btn p-0 text-warning" title="View"><i
                                                            class="bi bi-eye"></i></a>
                                                    <a href={{ route('leaves.edit', ['leave' => $leave->id]) }}
                                                        class="btn p-0 text-primary" title="Edit"><i
                                                            class="bi bi-pencil-fill"></i></a>
                                                    <form action={{ route('leaves.destroy', ['leave' => $leave->id]) }}
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn p-0 text-danger" title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this leave?')"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                        {{-- @endif --}}
                                    </tbody>
                                @endif

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
