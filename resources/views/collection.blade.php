@extends('layouts.main')

@section('main-content')
    <!-- Card Collection Main Container -->
    <div class="container mt-4 mr-4">

        <!-- Card Travel Collection -->
        <div class="d-flex flex-row flex-wrap justify-content-center">
            @foreach ($data as $item)
                <div class="card m-4 displayed-card" style="width: 18rem; height: fit-content;">
                    <!-- Image src MODIFY -->
                    <img src="{{ asset('images/' . $item->image_path) }}" class="card-img-top" alt="sample-img">
                    <div class="card-body">
                        <h5 class="card-title mb-0" data-fname="{{ $item->firstname }}" data-lname="{{ $item->lastname }}">{{ $item->firstname . ' ' . $item->lastname }}</h5>
                        <p class="text-muted mb-0" style="font-size: 1em;">{{ $item->program  }}</p>
                        <p class="text-muted mb-0" style="font-size: 0.9em;">{{ $item->updated_at }}</p>
                        <p class="text-muted mb-3" style="font-size: 0.9em;">{{ $item->address }}</p>
                        <span class="badge bg-{{ ($item->status == 'present') ? 'success' : (($item->status == 'late') ? 'warning' : 'danger') }} mb-3">{{ $item->status }}</span>
                        <p class="card-text mb-3" data-src="{{ url('/update/' . $item->id) }}">{{ $item->description }}</p>
                        <button type="button" class="btn btn-success btn-sm edit-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm">
                            <a href="{{ url('/delete/' . $item->id) }}"><i class="far fa-trash-alt"></i></a>
                        </button>
                    </div>
                </div> 
            @endforeach
        </div>

    </div>

    <button type="button" class="position-fixed bottom-0 end-0 m-3 invi add-btn">
        <a href="{{ url('/store') }}"><i class="fas fa-plus-square text-success"></i></a>
    </button>

    <!-- OffCanvas Component -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="overflow-y: auto">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Edit Place Name</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <!-- Update Card Container -->
        <div class="card" style="width: 100%;">
            <!-- Image src MODIFY -->
            <img img src="./images/sample.png" class="card-img-top" id="card-img-hover" alt="sample-img" >
            <div class="bg-secondary mb-1" style="width: 100%; height: 3em;"></div>
            <div class="card-body">
                <form id='form' action="" method="GET" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}

                    <input type="text" class="form-control card-title mb-1 shadow-none" id="firstname" name="firstname" placeholder="firstname">
                    <input type="text" class="form-control card-title mb-1 shadow-none" id="lastname" name="lastname" placeholder="lastname">
                    <input type="text" class="form-control card-title mb-1 shadow-none" id="program" name="program" placeholder="program">

                    <p class="text-muted mb-3" id="update-card-time" style="font-size: 0.9em;">Time created after saving...</p>

                    <input type="text" class="form-control card-title mb-1 shadow-none" id="address" name="address" placeholder="address">

                    <div class="btn-group btn-group-sm mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-success liveToastBtn" data-name="present">Present</button>
                        <button type="button" class="btn btn-warning liveToastBtn" data-name="late">Late</button>
                        <button type="button" class="btn btn-danger liveToastBtn" data-name="absent">Absent</button>

                        <!-- Toast Component -->
                        <div class="position-fixed bottom-0 start-0 p-3" style="z-index: 11">
                            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <i class="far fa-window-close" id="toast-logo" style="font-size: 1.3em; margin-right: 0.3rem; color: white;"></i>
                                    <strong class="me-auto text-white" id="toast-title" style="text-transform: capitalize;">Bootstrap</strong>
                                    <small id="toast-time" style="color: white;">11 mins ago</small>
                                    <button type="button" class="btn-close toast-close" data-bs-dismiss="toast" aria-label="Close" style="color:white;"></button>
                                </div>
                                <div class="toast-body" id="toast-description">
                                    Hello, world! This is a toast message.
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="card-text mb-0">Tell me about yourself...</label>
                    <textarea class="form-control card-text mb-3 shadow-none" id="description" name="description" rows="3"></textarea>

                    <!-- Hidden File -->
                    <input type="file" id="card-image" name="image" style="display: none;">
                    <input type="text" id="card-status" name="status" style="display: none;">

                    <!-- Submit Buttons -->
                    <button type="submit" name="save" class="btn btn-success btn-sm">Save</button>
                </form>
            </div>
        </div>

    </div>
@endsection