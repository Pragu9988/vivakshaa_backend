<!DOCTYPE html>
<html>
<head>
  <title>VivakShaa</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  {{-- <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}"> --}}

  <!-- plugin css -->
  <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <script src="{{ asset('assets/js/spinner.js') }}"></script>

  <div class="main-wrapper" id="app">
    @include('layout.sidebar')
    <div class="page-wrapper">
      @include('layout.header')
      <div class="page-content">
        @yield('content')
      </div>
      @include('layout.footer')
    </div>
  </div>

    <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <!-- end base js -->


    {{-- <script src="{{ asset('assets/plugins/toastr/toastr.min.js')}}" type="text/javascript"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- end common js -->
    <script type="text/javascript">
      @if(Session::has('message'))
      console.log("toastr activated");
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch (type) {
          case 'info':
              toastr.info("{{ Session::get('message') }}", 'Info!', {"closeButton": true});
              break;

          case 'warning':
              toastr.warning("{{ Session::get('message') }}", 'Warning!', {"closeButton": true});
              break;

          case 'success':
              // toastr.success("{{ Session::get('message') }}");
              toastr.success("{{ Session::get('message') }}", 'Success!', {"closeButton": true});
              break;

          case 'error':
              toastr.error("{{ Session::get('message') }}", 'Error!', {"closeButton": true});
              break;
      }
      @endif
      @if(count($errors) > 0)
      toastr.error("@foreach($errors->all() as $error){{$error}}<br>@endforeach", 'Error!', {"closeButton": true});
      @endif
  </script>

    @stack('custom-scripts')
</body>
</html>