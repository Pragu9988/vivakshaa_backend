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

{{-- <section class="section__question-list py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 col-xl-4 stretched-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4">Filters</h3>
                        <h6 class="card-title mt-4">Faculty</h6>
                        <div class="form-group border border-light p-2">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Management
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Science
                                </label>
                            </div>
                        </div>

                        <h6 class="card-title mt-4">semester</h6>
                        <div class="form-group border border-light p-2">
                            @foreach($programs as $program)
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="{{ $program->name }}">
                                    {{ $program->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <h6 class="card-title mt-4">Semester</h6>
                        <div class="form-group border border-light p-2">
                            @foreach($semesters as $semester)
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="{{ $semester->name }}">
                                    {{ $semester->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <h6 class="card-title mt-4">Courses</h6>
                        <div class="form-group border border-light p-2">
                            @foreach($courses as $course)
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="{{ $course->name }}">
                                    {{ $course->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-xl-8 stretched-card">
                <div class="d-flex justify-content-between align-items-start flex-wrap">
                    <div>
                        <h4 class="mb-3 mb-md-0">Search Results</h4>
                    </div>
                    <div class="d-flex align-items-start flex-wrap text-nowrap">
                        <div class="form-group mr-2">
                        <select class="form-control form-control-sm mb-3">
                            <option selected disabled hidden>Year All</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        </div>
                        <div class="form-group  mr-2">
                        <select class="form-control form-control-sm mb-3">
                            <option selected disabled hidden>Semester Type</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        </div>
                        <div class="form-group  mr-2">
                        <select class="form-control form-control-sm mb-3">
                            <option selected disabled hidden>Exam Type</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        </div>
                        <button type="button" class="btn btn-success btn-icon-text btn-sm">
                        <i class="btn-icon-prepend" data-feather="filter"></i>
                        Filter
                        </button>
                    </div>
                </div>
                @foreach($questions as $question)
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
                                <p class="text-muted tx-12">12mb</p>
                            </div>
                            <div class="info-text">
                                <p class="text-body mb-2">Downloads</p>
                                <p class="text-muted tx-12">5</p>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm btn-icon-text mr-2 mb-2 mb-md-0">
                            <i class="btn-icon-prepend" data-feather="eye"></i>
                            View
                        </button>
                        <a href="{{route('question.download', $question->question_file)}}">
                            <button type="button" class="btn btn-primary btn-sm btn-icon-text mb-2 mb-md-0">
                                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                            Download
                            </button>
                        </a>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-end">
                    {!! $questions->links() !!}
                </div>
            </div>
        </div>
    </div>
</section> --}}

@endsection

@push('custom-scripts')
<script src="{{ mix('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js" integrity="sha512-U5C477Z8VvmbYAoV4HDq17tf4wG6HXPC6/KM9+0/wEXQQ13gmKY2Zb0Z2vu0VNUWch4GlJ+Tl/dfoLOH4i2msw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush