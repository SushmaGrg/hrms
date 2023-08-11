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
            <h1>Time Entries</h1>
            <nav>
                <ol class="breadcrumb d-flex justify-content-between">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    {{-- <li ><a class="breadcrumb-item active" href="{{ route('leaves.create') }}" class="btn btn-primary">Add Leave</a></li> --}}
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
                                <div class="mb-3 mt-3">
                                    <form action="{{ route('time-entries.store') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Start Entry</button>
                                    </form>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Total Hours</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($timeEntries as $entry)
                                        <tr>
                                            <td>{{ $entry->entry_date ? $entry->entry_date->format('Y-m-d') : now()->format('Y-m-d') }}
                                            </td>
                                            <td>{{ $entry->start_time ? $entry->start_time->format('H:i:s') : 'Click Start Entery' }}
                                            </td>
                                            <td>{{ $entry->end_time ? $entry->end_time->format('H:i:s') : 'Ongoing' }}</td>
                                            <td>{{ $entry->totalHours() }}</td>
                                            <td>
                                                @if (!$entry->end_time)
                                                    <form action="{{ route('time-entries.update', $entry) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-danger">End Entry</button>
                                                    </form>
                                                @endif
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
