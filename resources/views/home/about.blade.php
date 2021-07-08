@extends('home.layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf_viewer.min.css" integrity="sha512-OrUZ956noL4EXloNRXp49BTIr4v9eIrlHn5DOviXJ6SDnRbkcFdP05gqgkzhbXZYCebbWjqstI+Ob1rrMyaDEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<header class="masthead py-5" style="background-image: url('{{ asset('uploads/blog/'.$blog->cover_pic) }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{$blog->title}}</h1>
                    <span class="meta">
                        Posted by
                        <a href="#!">{{$blog->author}}</a>
                        {{$blog->created_at->diffForHumans()}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content-->
<section class="section__blog-detail">
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-10 col-xl-8">
                    {!!$blog->body!!}
                </div>
            </div>
        </div>
    </article>
</section>
        

@endsection

@push('custom-scripts')
@endpush