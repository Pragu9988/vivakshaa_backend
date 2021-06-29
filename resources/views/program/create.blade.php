@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashcourse</a></li>
        <li class="breadcrumb-item"><a href="{{ route('program.index') }}">Program</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ isset($program) ? $program->name : "Add Program"}}</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Create Program</div>
                <form action="{{ isset($program) ? route('program.update', $program->id) : route('program.store') }}" method="POST">
                @csrf
                @if(isset($program))
                    <input name="_method" value="put" hidden>
                @endif
                    <div class="form-group">
                        <label for="programName">Program Name<span>*</span></label>
                        <input type="text" class="form-control" value="{{ isset($program) ? $program->name : old('name') }}" placeholder="Enter Program Name (Eg. Bachelor of Business Administration)" id="programName" name="name" required >
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label class="control-label" for="abbreviation">Abbreviation<span>*</span></label>
                            <input type="text" class="form-control" value="{{ isset($program) ? $program->abbreviation : old('abbreviation') }}" placeholder="Enter Abbreviation(Eg. BCIS)" id="abbreviation" name="abbreviation" required >
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="faculty">Faculty<span>*</span></label>
                                <select class="form-control" id="faculty" name="faculty" required >
                                    <option selected disabled>Select faculty</option>
                                    <option>Management</option>
                                    <option>Science</option>
                                </select>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="form-group">
                        <label for="programDesc">Description</label>
                        <textarea class="form-control"  id="programDesc" rows="10" name="description">{{ isset($program) ? $program->description : old('description') }}</textarea>
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
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#programDesc',
            toolbar: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullpage | ' +
            'forecolor backcolor emoticons | help',
        });
    </script>
@endpush