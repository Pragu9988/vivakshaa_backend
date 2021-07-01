<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
        <i class="link-icon" data-feather="book-open"></i>
        Vivak<span>Shaa</span>
        </a>
        <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
        </div>
    </div>

    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/') }}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Course Management</li>
            <li class="nav-item {{ active_class(['program']) }}">
                <a href="{{ url('/program') }}" class="nav-link">
                <i class="link-icon" data-feather="grid"></i>
                <span class="link-title">Programs</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['semester']) }}">
                <a href="{{ url('/semester') }}" class="nav-link">
                <i class="link-icon" data-feather="trello"></i>
                <span class="link-title">Semesters</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['course']) }}">
                <a href="{{ url('/course') }}" class="nav-link">
                <i class="link-icon" data-feather="book"></i>
                <span class="link-title">Courses</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['question']) }}">
                <a href="{{ url('/question') }}" class="nav-link">
                <i class="link-icon" data-feather="file"></i>
                <span class="link-title">Questions</span>
                </a>
            </li>
            <li class="nav-item nav-category">Master Setup</li>
            <li class="nav-item {{ active_class(['user']) }}">
                <a href="{{ url('/user') }}" class="nav-link">
                <i class="link-icon" data-feather="user"></i>
                <span class="link-title">Users</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['slider']) }}">
                <a href="{{ url('/slider') }}" class="nav-link">
                <i class="link-icon" data-feather="toggle-right"></i>
                <span class="link-title">Sliders</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['blog']) }}">
                <a href="{{ url('/blog') }}" class="nav-link">
                <i class="link-icon" data-feather="toggle-right"></i>
                <span class="link-title">Blogs</span>
                </a>
            </li>
        </ul>
    </div>
</nav>