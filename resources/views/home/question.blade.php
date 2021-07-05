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

                        <h6 class="card-title mt-4">Program</h6>
                        <div class="form-group border border-light p-2">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                BBA
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                BCIS
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                BHCM
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                BPH
                                </label>
                            </div>
                        </div>

                        <h6 class="card-title mt-4">Semester</h6>
                        <div class="form-group border border-light p-2">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Semester I
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Semester II
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Semester III
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Semester IV
                                </label>
                            </div>
                        </div>

                        <h6 class="card-title mt-4">Courses</h6>
                        <div class="form-group border border-light p-2">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Digital Economy
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Java
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Business Statistics
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Semester IV
                                </label>
                            </div>
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
                          <option selected>Year All</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>
                      <div class="form-group  mr-2">
                        <select class="form-control form-control-sm mb-3">
                          <option selected>Semester Type</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>
                      <div class="form-group  mr-2">
                        <select class="form-control form-control-sm mb-3">
                          <option selected>Exam Type</option>
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
                                <p class="text-muted tx-12">{{$question->question_file}}</p>
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
                
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="card-title">Business Statistics</h6>
                        <div class="d-flex justify-content-between mb-4">
                            <div class="info-text">
                                <p class="text-body mb-2">Year</p>
                                <p class="text-muted tx-12">2020</p>
                            </div>
                            <div class="info-text">
                                <p class="text-body mb-2">Semester Type</p>
                                <p class="text-muted tx-12">Fall</p>
                            </div>
                            <div class="info-text">
                                <p class="text-body mb-2">Exam Type</p>
                                <p class="text-muted tx-12">Board Exam</p>
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
                        <button type="button" class="btn btn-primary btn-sm btn-icon-text mb-2 mb-md-0">
                            <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                        Download
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection