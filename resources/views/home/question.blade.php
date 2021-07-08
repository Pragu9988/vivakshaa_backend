@extends('home.layout.master')

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

<section class="section__question-list py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 col-xl-4 stretched-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4">Filters</h3>

                        <h6 class="card-title mt-4">Program</h6>
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
                @endforeach
                <div class="d-flex justify-content-end">
                    {!! $questions->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('custom-scripts')
<script src="{{ mix('js/app.js') }}"></script>
@endpush