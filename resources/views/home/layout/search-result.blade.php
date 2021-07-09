<div class="col-12 col-lg-8 col-xl-8 stretched-card">
    <div class="d-flex justify-content-start align-items-start flex-wrap mb-4">
        @if(request()->query('search'))
        <div>
            <h4 class="mb-3 mb-md-0">Search results for:  {{ '"'.request()->query('search'). '"' }}</h4>
           
        </div>
        @endif
    </div>
    <div id="questionList" class="filter_data">
        @forelse($questions as $question)
        <div class="card mb-4">
            <div class="card-body">
                <h6 class="card-title">{{$question->title}}</h6>
                <div class="d-flex justify-content-between mb-4">
                    <div class="info-text">
                        <p class="text-body mb-2">Year</p>
                        <p class="text-muted tx-12">{{$question->year}}</p>
                    </div>
                    <div class="info-text">
                        <p class="text-body mb-2">Semester Type</p>
                        <p class="text-muted tx-12">{{$question->type}}</p>
                    </div>
                    <div class="info-text">
                        <p class="text-body mb-2">Exam Type</p>
                        <p class="text-muted tx-12">{{$question->exam}}</p>
                    </div>
                    <div class="info-text">
                        <p class="text-body mb-2">File Size</p>
                        <p class="text-muted tx-12">{{number_format($question->file_size / 1048576,2 )}}</p>
                    </div>
                    <div class="info-text">
                        <p class="text-body mb-2">Downloads</p>
                        <p class="text-muted tx-12">5</p>
                    </div>
                </div>
                <a href="{{ route('question.detail', $question->id) }}">
                    <button type="button" class="btn btn-outline-primary btn-sm btn-icon-text mr-2 mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="eye"></i>
                        View
                    </button>
                </a>
                
                <a href="{{route('question.download', $question->question_file)}}">
                    <button type="button" class="btn btn-primary btn-sm btn-icon-text mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="download"></i>
                    Download
                    </button>
                </a>
            </div>
        </div>
        @empty
        <div class="d-flex justify-content-center mb-4">
            <img src="{{ asset('assets/images/no-result.jpg')}}" alt="" class="w-50">
        </div>
        <h5 class="text-center mb-2">No result found for</h5>
        <h4 class="text-center text-muted"><strong>"{{ request()->query('search') }}"</strong></h4>
        
        @endforelse
        <div class="d-flex justify-content-end">
            {!! $questions->appends(['search' => request()->query('search')])->links() !!}
        </div>
    </div>

</div>

@push('custom-scripts')
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

        $('#btnFilter').click(function() {
            var program = $('#program_id').val();
            var semester = $('#semester_id').val();
            var course = $('#course_id').val();
            var _token = $('input[name="_token"]').val();
            var output = " ";
            $.ajax({
                url: "{{ route('question.get-questions') }}",
                method: 'POST',
                data: {program:program, semester:semester, course:course, _token:_token},
                success: function(data) {
                    console.log(data);
                    // $("#questionList").empty();
                    for(var i=0; i<data.length; i++) {
                        var ques_url ='{{route("question.detail", "")}}'+'/'+ data[i].id;
                        var file_url ='{{route("question.download", "")}}'+'/'+ data[i].question_file;
                        output+='<div class="card mb-4">';
                        output+='<div class="card-body">';
                        output+='<h6 class="card-title">'+ data[i].title +'</h6>';
                        output+='<div class="d-flex justify-content-between mb-4">';
                        output+='<div class="info-text">';
                        output+='<p class="text-body mb-2">Year</p>'
                        output+='<p class="text-muted tx-12">'+ data[i].year +'</p>';
                        output+='</div>';
                        output+='<div class="info-text">';
                        output+='<p class="text-body mb-2">Semester Type</p>';
                        output+='<p class="text-muted tx-12">'+ data[i].type +'</p>';
                        output+='</div>';
                        output+='<div class="info-text">';
                        output+='<p class="text-body mb-2">Exam Type</p>';
                        output+='<p class="text-muted tx-12">'+ data[i].exam +'</p>';
                        output+='</div>';
                        output+='<div class="info-text">';
                        output+='<p class="text-body mb-2">File Size</p>';
                        output+='<p class="text-muted tx-12">'+ data[i].file_size +'</p>';
                        output+='</div>';
                        output+='<div class="info-text">';
                        output+='<p class="text-body mb-2">Downloads</p>';
                        output+='<p class="text-muted tx-12">5</p>';
                        output+='</div>';
                        output+='</div>';
                        output+='<a href="'+ ques_url +'"><button type="button" class="btn btn-outline-primary btn-sm btn-icon-text mr-2 mb-2 mb-md-0"><i class="btn-icon-prepend" data-feather="eye"></i>View</button></a>';
                        output+='<a href="'+ file_url +'"><button type="button" class="btn btn-primary btn-sm btn-icon-text mb-2 mb-md-0"><i class="btn-icon-prepend" data-feather="download"></i>Download</button></a>';
                        output+='</div>';
                        output+='</div>';
                    }
                    $("#questionList").html(output);
                }
            })
        })
    });
    </script>
@endpush