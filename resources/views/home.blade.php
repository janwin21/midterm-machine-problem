@extends('layouts.main')

@section('main-content')
    <!-- Main Content -->
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <!-- Image src MODIFY -->
                <img src="{{ asset('images/home-background.jpg') }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Student Attendance</h1>
                <p class="lead">A simple web application that manage a simple CRUD technique from integrating database. This is a back-end server supported by <i><strong>Laravel</strong></i></strong>.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="{{ url('/collection') }}"><button type="button" class="btn btn-success">Go to Class</button><a>
                </div>
            </div>
        </div>
    </div>
@endsection