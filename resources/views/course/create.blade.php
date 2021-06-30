@extends('layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}"
          rel="stylesheet"/>
    <link href="{{asset('assets/plugins/sweetalert2/sweetalert.css')}}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/simplemde/simplemde.min.css') }}" rel="stylesheet"/>
@endpush
@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Course</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ isset($course) ? $course->name : "Add Course"}}</li>
    </ol>
</nav>


<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Create Course</div>
                <form action="{{ isset($course) ? route('course.update', $course->id) : route('course.store') }}" method="POST">
                @csrf
                @if(isset($course))
                    <input name="_method" value="put" hidden>
                @endif
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Cover picture</h6>
                                    <input type="file" id="courseCover"
                                            class="border courseCover"
                                            name="cover_pic"
                                            data-default-file="{{isset($course)?$course->cover_pic:old('cover_pic')}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="courseName">Course Name<span>*</span></label>
                                <input type="text" class="form-control" value="{{ isset($course) ? $course->name : old('name') }}" placeholder="Enter Course Name" id="courseName" name="name" required >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="code">Course Code<span>*</span></label>
                                <input type="text" class="form-control" value="{{ isset($course) ? $course->code : old('code') }}" placeholder="Enter Code(Eg. ENG 101)" id="code" name="code" required >
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="program">Program<span>*</span></label>
                                <select class="form-control js-example-basic-single w-100" id="program" name="program_id" required >
                                    <option selected disabled>Select a Program</option>
                                    @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{$program->name}} <strong>({{$program->abbreviation}})</strong></option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="semester">Semester<span>*</span></label>
                                <select class="form-control" id="semester" name="semester_id" required >
                                    <option selected disabled>Select a Semester</option>
                                    @foreach($semesters as $semester)
                                    <option value="{{$semester->id}}">{{$semester->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="form-group">
                        <label for="tinymceDescription">Description</label>
                        <textarea class="form-control"  id="tinymceDescription" rows="5" name="description">{{ isset($course) ? $course->description : old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/typeahead-js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
    <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/tags-input.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/timepicker.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert.js')}}"></script>
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
@endpush