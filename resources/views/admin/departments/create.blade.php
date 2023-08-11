@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create Department</h1>
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

                        <!-- No Labels Form -->
                        <form class="row g-3" action="{{ route('departments.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name" placeholder="Your Name">
                                @error('name')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                            </div>
                            {{-- <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Address">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="City">
                            </div>
                            <div class="col-md-4">
                                <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="Zip">
                            </div>--}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div> 
                        </form><!-- End No Labels Form -->

                    </div>
                </div>

                {{-- <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Floating labels Form</h5>
    
                  <!-- Floating Labels Form -->
                  <form class="row g-3">
                    <div class="col-md-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Your Name</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="email" class="form-control" id="floatingEmail" placeholder="Your Email">
                        <label for="floatingEmail">Your Email</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating">
                        <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                        <label for="floatingTextarea">Address</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="col-md-12">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingCity" placeholder="City">
                          <label for="floatingCity">City</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="State">
                          <option selected>New York</option>
                          <option value="1">Oregon</option>
                          <option value="2">DC</option>
                        </select>
                        <label for="floatingSelect">State</label>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingZip" placeholder="Zip">
                        <label for="floatingZip">Zip</label>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                  </form><!-- End floating Labels Form -->
    
                </div>
              </div> --}}

            </div>
        </section>

    </main><!-- End #main -->
@endsection
