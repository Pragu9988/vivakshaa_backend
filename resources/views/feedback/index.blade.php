@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Feedback</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="float-left">Feedback</h4>
                    <div class="table-responsive">
                        <table id="feedbackDatatable" class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
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
    $('#feedbackDatatable').DataTable( {
      processing : true,
      serverSide : true,
      ajax : "{{ route('feedback.index') }}",
      columns : [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'subject', name: 'subject'},
            {data: 'message', name: 'message'},
            {data: 'actions', 'render': function (data, type, row) {
                        let options = '<div style="display: flex">';
                            options += '<a href="' + data['view'] + '" title="View feedback?"><button class="btn btn-outline-info btn-xs mr-2" data-toggle="modal" data-target="#exampleModalCenter">View</button></a> ';
                        options += '</div>';
                        return options;
                    }}
        ]
    });
  });
    </script>

@endpush
