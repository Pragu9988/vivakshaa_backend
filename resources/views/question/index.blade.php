@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Vivakshaa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Question</li>
    </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="float-left">Questions</h4>
        <div class="header-btn-grp">
          @can('create', App\Question::class)
            <a href="{{ route('question.create')}}">
                <button type="button" class="btn btn-primary mb-1 mb-md-0 float-right">
                    Add Question
                </button>
            </a>
          @endcan
        </div>
        <div class="table-responsive">
          <table id="questionDatatable" class="table">
            <thead>
              <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Program</th>
                <th>Semester</th>
                <th>Course</th>
                <th>Created By</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/data-table.js') }}"></script>
  <script>
  $(document).ready( function() {
    $('#questionDatatable').DataTable( {
      processing  : true,
      serverSide  : true,
      order       : [[1, 'desc']],
      ajax        : "{{ route('question.index') }}",
      columns     : [
        {data: 'title', name: 'title'},
        {data: 'year', name: 'year'},
        {data: 'program_abbr', name: 'programs.abbreviation'},
        {data: 'semester_name', name: 'semesters.name'},
        {data: 'course_name', name: 'courses.name'}, 
        {data: 'created_by', name: 'users.name'},
        {data: 'actions', 'render': function (data, type, row) {
            let options = '<div style="display: flex">';
            if (data['authorizedToEdit']) {
              options += '<a href="' + data['edit'] + '" title="Edit course?"><button class="btn btn-outline-info btn-xs mr-2">Edit</button></a> ';
            }
            
            if (data['authorizedToDelete']) {
            options += 
            '<form action="' + row['actions']['delete'] + '" method="POST">' +
              '<input type="hidden" name="_method" value="DELETE">' + 
              '<input type="hidden" name="_token" value="{{ csrf_token() }}">' + 
              '<input type="submit" value="Delete" class="btn btn-xs btn-outline-danger">' + 
            '</form>';
            }
            
            options += '</div>';
            return options;
          }
        }
      ]
    });
  });
  </script>
@endpush
