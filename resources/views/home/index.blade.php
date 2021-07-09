@extends('home.layout.master')

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<!-- Main Body -->
<main>
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="fw-bolder text-white mb-4">Vivak<span class="text-primary">Shaa</span></h1>
                        <p class="lead text-white-50 mb-4">Enhance your individual performance across all subjects.</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <a class="btn btn-primary px-4 me-sm-3" href="{{url('/home/question')}}">Search Question</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="section__about-vivakshaa my-5">
        <div class="container">
            <div class="row featurette">
                <div class="col-md-7">
                  <h2 class="featurette-heading mb-4">Vivakshaa is the <span class="text-muted">easiest and surest way</span> to maximize your score.</h2>
                  <p class="lead">We've done the hard work for you. All the subject areas are covered. Every question comes with complete rationale. Vivakshaa helps to enhance your individual performance across all subjects. Put Vivakshaa to work for you!</p>
                </div>
                <div class="col-md-5">
                  <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22500%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20500%20500%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a627ac213%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a627ac213%22%3E%3Crect%20width%3D%22500%22%20height%3D%22500%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22185.125%22%20y%3D%22261.1%22%3E500x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                </div>
              </div>
        </div>
    </section>
    <section class="container section__featured-question py-5">
        <div class="row mb-4">
            <div class="d-flex justify-content-between p-3">
                <h2>Featured <span class="text-muted">Questions</span></h2>
            </div>
        </div>
        <div class="row  text-center">
            @foreach($questions as $question)
            <div class="col-md-4">
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
                        </div>
                        <a href="{{ route('question.detail', $question->id) }}">
                            <button type="button" class="btn btn-outline-primary btn-sm btn-icon-text mr-2 mb-2 mb-md-0">
                                <i class="btn-icon-prepend" data-feather="eye"></i>
                                View
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center text-center">
                <a href="{{ url('home/question' )}}"></a><button type="button" class="btn btn-outline-primary">View All</button>
            </div>
        </div>
    </section>
    {{-- <section class="section__faculty py-5">
        <div class="container">
            <h2 class="text-center mb-5">Browse by <span class="text-muted">Faculty</span></h2>
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 col-lg-6">
                    <div class="card">
                        <img class="card-img" src="https://source.unsplash.com/user/erondu/1600x900" alt="Bologna">
                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                            <h2 class="text-center mb-3">Management</h2>
                            <div class="d-flex justify-content-center">
                                <a href="./program.html" class="btn btn-outline-light m-2"><i class="fas fa-graduation-cap"></i>&nbsp;&nbsp;2 Program</a>
                                <a href="./program.html" class="btn btn-outline-light m-2"><i class="fas fa-file-pdf ml-2"></i>&nbsp;&nbsp;25 Question</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-6">
                    <div class="card">
                        <img class="card-img" src="https://source.unsplash.com/user/erondu/1600x900" alt="Bologna">
                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                            <h2 class="text-center mb-3">Science</h2>
                            <div class="d-flex justify-content-center">
                                <a href="./program.html" class="btn btn-outline-light m-2"><i class="fas fa-graduation-cap"></i>&nbsp;&nbsp;3 Program</a>
                                <a href="./program.html" class="btn btn-outline-light m-2"><i class="fas fa-file-pdf ml-2"></i>&nbsp;&nbsp;5 Question</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="section__program py-5">
        <div class="container">
            <h2 class="text-center mb-5">Browse by <span class="text-muted">Program</span></h2>
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="card">
                        <img class="card-img" src="https://source.unsplash.com/user/erondu/1600x900" alt="Bologna">
                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                            <h3 class="text-center mb-3">BCIS</h3>
                            <div class="d-flex justify-content-center">
                                <a href="./course.html" class="btn btn-outline-light m-2"><i class="fas fa-graduation-cap"></i>&nbsp;&nbsp;8 Courses</a>
                                <a href="./course.html" class="btn btn-outline-light m-2"><i class="fas fa-file-pdf ml-2"></i>&nbsp;&nbsp;25 Question</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="card">
                        <img class="card-img" src="https://source.unsplash.com/user/erondu/1600x900" alt="Bologna">
                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                            <h3 class="text-center mb-3">BBA</h3>
                            <div class="d-flex justify-content-center">
                                <a href="./course.html" class="btn btn-outline-light m-2"><i class="fas fa-graduation-cap"></i>&nbsp;&nbsp;3 Courses</a>
                                <a href="./course.html" class="btn btn-outline-light m-2"><i class="fas fa-file-pdf ml-2"></i>&nbsp;&nbsp;5 Question</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="card">
                        <img class="card-img" src="https://source.unsplash.com/user/erondu/1600x900" alt="Bologna">
                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                            <h3 class="text-center mb-3">BBA</h3>
                            <div class="d-flex justify-content-center">
                                <a href="./course.html" class="btn btn-outline-light m-2"><i class="fas fa-graduation-cap"></i>&nbsp;&nbsp;3 Courses</a>
                                <a href="./course.html" class="btn btn-outline-light m-2"><i class="fas fa-file-pdf ml-2"></i>&nbsp;&nbsp;5 Question</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section__news-slider">
        <div class="container">
            <div class="row mb-4">
                <div class="d-flex justify-content-between p-3">
                    <h2>Recent News</h2>
                    <p><a href="#">See All</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel">
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1596265371388-43edbaadab94?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=501" alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                    
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503" alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                        
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1564979268369-42032c5ca998?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=300&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=500" alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                        
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1576659531892-0f4991fca82b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=501" alt="">
                            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                        
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1586083702768-190ae093d34d?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=305&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=505" alt="">
                            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                
                        <div class="post-slide">
                            <div class="post-img">
                                <img src="https://images.unsplash.com/photo-1484656551321-a1161420a2a0?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=306&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=506" alt="">
                            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>              
    </section>
</main>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>

    <script>
        $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        autoplay: true,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    })
    </script>
    
@endpush