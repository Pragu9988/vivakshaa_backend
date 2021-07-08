@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="float-left">Blogs</h4>
                    <a href="{{route('blog.create')}}"><button class="btn btn-success mb-1 mb-md-0 float-right pull-right">Add</button></a>
                    <div class="table-responsive">
                        <table id="blogDatatable" class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Author</th>
                                <th>Created at</th>
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
    $('#blogDatatable').DataTable( {
      processing : true,
      serverSide : true,
      ajax : "{{ route('blog.index') }}",
      columns : [
            {data: 'title', name: 'title'},
            {data: 'body', name: 'body'},
            {data: 'author', name: 'author'},
            {data: 'created_at', name: 'created_at'},
            // {data: 'action', name: 'action', orderable: false, searchable: false}
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
                    }}
        ]
    });
  });
    </script>

@endpush
