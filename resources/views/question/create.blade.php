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
        <li class="breadcrumb-item"><a href="{{ route('question.index') }}">Question</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ isset($question) ? $question->title : "Add Question"}}</li>
    </ol>
</nav>


<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Add New Question</div>
                <form action="{{ isset($question) ? route('question.update', $question->id) : route('question.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($question))
                    <input name="_method" value="put" hidden>
                @endif
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Thumbnail</h6>
                                    <input type="file" id="thumbnail"
                                            class="border dropifyFile"
                                            name="thumbnail"
                                            data-default-file="{{isset($question)?$question->thumbnail:old('thumbnail')}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Question File</h6>
                                    <input type="file" id="question_file"
                                            class="border dropifyFile"
                                            name="question_file"
                                            data-default-file="{{isset($question)?$question->question_file:old('question_file')}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="questionTitle">Question Title<span>*</span></label>
                        <input type="text" class="form-control" value="{{ isset($question) ? $question->title : old('title') }}" placeholder="Enter Course Name" id="questionTitle" name="title" required >
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="year">Year<span>*</span></label>
                                <select name="year" id="year" class="form-control">
                                    <option selected disable>Select Exam Year</option>
                                    <option value="2030">2030</option>
                                    <option value="2029">2029</option>
                                    <option value="2028">2028</option>
                                    <option value="2027">2027</option>
                                    <option value="2026">2026</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="type">Semester Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option selected disable>Select Semester Type</option>
                                    <option value="spring">Spring</option>
                                    <option value="fall">Fall</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <label class="control-label" for="exam">Examination Type</label>
                                <select name="exam" id="exam" class="form-control">
                                    <option selected disable>Select Examination Type</option>
                                    <option value="terminal">Terminal Examination</option>
                                    <option value="sent_up">Send Up Examination</option>
                                    <option value="board">Board Examination</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="program">Program<span>*</span></label>
                                <select class="form-control dynamic" id="program_id" name="program_id" data-dependent = "course_id">
                                    <option selected disable>Select a Program</option>
                                    @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="semester">Semester<span>*</span></label>
                                <select name="semester_id" id="semester_id" class="form-control dynamic" data-dependent = "course_id">
                                    <option selected disable>Select a Semester</option>
                                    @foreach($semesters as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="course">Course<span>*</span></label>
                                <select name="course_id" id="course_id" class="form-control">
                                    <option selected disable>Select a Course</option>
                                </select>
                            </div>  
                        </div><!-- Col -->
                        {{ csrf_field() }}
                    </div><!-- Row -->
                    <div class="form-group">
                        <label for="tinymceDescription">Description</label>
                        <textarea class="form-control"  id="tinymceDescription" rows="5" name="description">{{ isset($question) ? $question->description : old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                    <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" {{(isset($question) && $question->is_active) || old('is_active')?"checked":""}} 
                        class="form-check-input" name="is_active">
                        verified
                    </label>
                    </div>
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
    <script>
    $(document).ready(function() {
        $('.dynamic').change(function() {
            if($(this).val() != '') {
                var select = $(this).attr('id');
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                var output = " ";
                $.ajax({
                    url: "{{ route('question.fetch') }}",
                    method: "POST",
                    data: {select:select, value:value, _token:_token, dependent:dependent},
                    success: function(data) {
                        output+= '<option value="0" selected disabled>Choose a Course</option>';
                        for(var i=0; i<data.length; i++) {
                            output+='<option value="' + data[i].id + '">' + data[i].name + '</option>';
                        }
                        $('#'+dependent).html(output);
                    }
                })
            }
        });
    });
    </script>
@endpush