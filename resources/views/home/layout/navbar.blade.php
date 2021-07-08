<header class="header">
    <div class="container-fluid shadow-sm">
        <div class="row justify-content-center align-items-center bg-primary bg-gradient header__top-nav">
            <div class="col p-1">
                <small class="d-flex justify-content-center align-self-center text-light mb-1">New Question: Digital Economy 2072, Board</small>
            </div>
        </div>
        <div class="container">
            <div class="row header__main-nav p-3">
                <div class="col-12 col-md-2">
                    <div class="header__logo-box">
                        <a href="{{url('/')}}" class="header__logo-box--brand">
                        <i class="link-icon" data-feather="book-open"></i>
                        Vivak<span>Shaa</span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
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
                <div class="col-md-4 navbar-home d-flex justify-content-end align-items-center">
                    @if(null==auth()->user()) 
                        <a href="{{route('login')}}"><i class="ft-user"></i> <h6>Login<h6></a>
                    @else
                    <div class="navbar-content">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown nav-profile">
                                <p class="text-muted font-weight-bold mb-0 mr-2">{{auth()->user()->name}}</p>
                                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="profile">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center">
                                </div>
                                <div class="dropdown-body">
                                    <ul class="profile-nav py-0 px-2">
                                        <li class="nav-item">
                                            <a href="javascript:;" class="nav-link">
                                            <i data-feather="log-out"></i>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid navbar-light bg-light">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/home/question')}}">Questions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>
        </ul>
    </div>
</header>