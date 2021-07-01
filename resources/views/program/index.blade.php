@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Vivakshaa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Program</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="float-left">Programs</h4>
        <div class="header-btn-grp">
            <a href="{{ route('program.create')}}">
                <button type="button" class="btn btn-primary mb-1 mb-md-0 float-right">
                    Add Program
                </button>
            </a>
        </div>
        <div class="table-responsive">
          <table id="programDatatable" class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Abbreviation</th>
                <th>Faculty</th>
                <th>Description</th>
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
    $('#programDatatable').DataTable( {
      processing : true,
      serverSide : true,
      ajax : "{{ route('program.index') }}",
      columns : [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'abbreviation', name: 'abbreviation'},
            {data: 'faculty', name: 'faculty'},
            {data: 'description', name: 'description'},
            // {data: 'action', name: 'action', orderable: false, searchable: false}
            {data: 'actions', 'render': function (data, type, row) {
                        let options = '<div style="display: flex">';

                        options += '<a href="' + data['edit'] + '" title="Edit program?"><button class="btn btn-outline-info btn-xs mr-2">Edit</button></a> ';

                        options += 
                        '<form action="' + row['actions']['delete'] + '" method="POST">' +
                          '<input type="hidden" name="_method" value="DELETE">' + 
                          '<input type="hidden" name="_token" value="{{ csrf_token() }}">' + 
                          '<input type="submit" value="Delete" class="btn btn-xs btn-outline-danger">' + 
                        '</form>';
                        options += '</div>';
                        return options;
                    }}
        ]
    });
  });
  </script>
@endpush
