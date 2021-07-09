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
                        <form action="{{ route('home.question') }}" method="GET">
                            <div class="bg-light shadow-sm">
                                <div class="input-group">
                                    <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon1" name="search" value="{{ request()->query('search') }}" id="search" class="form-control border-0 bg-light">
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
            @include('home.layout.sidebar')
            @include('home.layout.search-result')
        </div>
    </div>
</section>

@endsection
