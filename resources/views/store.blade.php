@extends('layouts.main')

@section('main-content')
    <div class="d-flex justify-content-center">

        <!-- Edit Container -->
        <div class="card" style="width: 23rem;">
            <!-- Image src MODIFY -->
            <img img src="./images/sample.png" class="card-img-top" id="card-img-hover" alt="sample-img" style="cursor: pointer;">
            <button type="button" class="btn btn-secondary btn-sm mb-2" id="card-img-button" style="display: none">Click the Photo</button>
            <div class="card-body">
                <form action="{{ url('/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

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
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
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
                    <button type="submit" name="create" class="btn btn-success btn-sm">Create</button>
                    <button type="button" class="btn btn-danger btn-sm">
                        <a href="{{ url('/collection') }}"><i class="far fa-window-close"></i></a>
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection