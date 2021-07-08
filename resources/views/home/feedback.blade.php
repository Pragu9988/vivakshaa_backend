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
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="section__feedback-form my-5">
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-md-4 pr-md-0">
                    <div class="auth-left-wrapper" style="background-image: url({{ url('https://via.placeholder.com/219x452') }})">
        
                    </div>
                </div>
                <div class="col-md-8 pr-md-0">
                    <div class="auth-form-wrapper p-5">
                        <a href="#" class="noble-ui-logo d-block mb-2">Vivak<span>Shaa</span></a>
                        <h5 class="text-muted font-weight-normal mb-4">Give us your view regarding our website!</h5>
                        <form action="{{ route('feedback.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name<span>*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Name" id="name" name="name" required >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email<span>*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email" id="email" name="email" required >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject<span>*</span></label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Enter Your subject" id="subject" name="subject" required >
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="message">Any suggestion or complain</label>
                                <textarea class="form-control @error('message') is-invalid @enderror"  id="message" rows="5" name="message"></textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
