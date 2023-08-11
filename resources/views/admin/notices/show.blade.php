@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Notice Details</h1>
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
        <div class="card-header">
            {{ $notice->title }}
        </div>
        <div class="card-body">
            {{ $notice->content }}
        </div>
        <div class="card-footer">
            Created At: {{ $notice->created_at }}
        </div>
    </div>

</div>
</div>

</div>
</section>

</main><!-- End #main -->
@endsection
