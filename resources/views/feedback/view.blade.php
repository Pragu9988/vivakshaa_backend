@extends('layout.master')

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
                    <div class="col-md-12 mb-5">
                        <h4 class="float-left">Feedback from <span class="text-muted">{{ $feedback->name }}</span></h4>
                        <a href="{{url('/feedback')}}" class="btn btn-outline-info float-right pull-right">Go Back</a>
                    </div>
                    <div class="table-responsive table-striped">
                        <table id="courseDatatable" class="table">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>:</td>
                                    <td>{{$feedback->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>{{$feedback->email}}</td>
                                </tr>
                                <tr>
                                    <th>Subject</th>
                                    <td>:</td>
                                    <td>{{$feedback->subject}}</td>
                                </tr>
                            </tbody>
                        </table>
                            <div class="col-md-12 my-4">
                                <h6 class="mb-2">Complain or Suggestion</h6>
                                <p class="">
                                    {{$feedback->message}}
                                </p>
                            </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
