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

<!-- Main Content-->
<section class="section__blogs my-5">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                @foreach($blogs as $blog)
                <div class="post-preview">
                    <a href="{{ route('home.blog-detail', $blog->slug) }}">
                        <h2 class="post-title">{{$blog->title}}</h2>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">{{$blog->author}}</a>
                        {{$blog->created_at->diffForHumans()}}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                @endforeach
                <!-- Pager-->
                <div class="d-flex justify-content-end">
                    {!! $blogs->links() !!}
                </div>                
            </div>
        </div>
    </div>
</section>
        

@endsection

@push('custom-scripts')
@endpush