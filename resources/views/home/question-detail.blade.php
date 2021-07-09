@extends('home.layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf_viewer.min.css" integrity="sha512-OrUZ956noL4EXloNRXp49BTIr4v9eIrlHn5DOviXJ6SDnRbkcFdP05gqgkzhbXZYCebbWjqstI+Ob1rrMyaDEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<header class="bg-dark py-5">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center my-5">
                    <h1 class="fw-bolder text-white mb-4">Vivak<span class="text-primary">Shaa</span></h1>
                    <p class="lead text-white-50 mb-4">Enhance your individual performance across all subjects.</p>
                    <div>
                        <form action="">
                            <div class="bg-light shadow-sm">
                                <div class="input-group">
                                    <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                                    <div class="input-group-append bg-primary ml-0">
                                        <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="text-light" data-feather="search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="section__pdf py-5">
    <div class="container">
        <div class="d-flex align-items-start">
            <h3 class="mr-2">{{$question->title}}</h3>
            <small class="bg-primary py-1 px-3 text-white rounded-pill">{{$question->year}}</small>
        </div>
        <div class="row my-4">
            <div class="col-sm-4">
                <div class="table-responsive table-striped">
                    <table id="courseDatatable" class="table">
                        <tbody>
                            <tr>
                                <th>Year</th>
                                <td>:</td>
                                <td>{{$question->year}}</td>
                            </tr>
                            <tr>
                                <th>Program</th>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Semester</th>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Course</th>
                                <td>:</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="table-responsive table-striped">
                    <table id="courseDatatable" class="table">
                        <tbody>
                            <tr>
                                <th>Semester Type</th>
                                <td>:</td>
                                <td>{{$question->type}}</td>
                            </tr>
                            <tr>
                                <th>Exam Type</th>
                                <td>:</td>
                                <td>{{$question->exam}}</td>
                            </tr>
                            <tr>
                                <th>File Size</th>
                                <td>:</td>
                                <td>12mb</td>
                            </tr>
                            <tr>
                                <th>Downloads</th>
                                <td>:</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div style="height: 100vh" class="col-sm-12">
                <iframe height="100%" width=100% src='{{ asset('uploads/question/'.$question->question_file) }}'></iframe>
            </div>
        </div>
    </div>
</section>

@endsection