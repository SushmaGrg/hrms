@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Notice</h1>
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
     <form class="row g-3" action="{{ route('notices.update', $notice->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <input type="text" class="form-control" name="title" placeholder="" value="{{ $notice->title }}" required>
            @error('title')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-12">
            <input type="text" class="form-control" name="content" placeholder="" value="{{ $notice->content }}" required>
            @error('content')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
        </div>
       
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div> 
    </form>

            </div>
</div>

</div>
</section>

</main><!-- End #main -->
