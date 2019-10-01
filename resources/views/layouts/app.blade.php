<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/sb-admin-2.js')}}"></script>
   <!--  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/parsley.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/pretty-checkbox.min.css')}}">
    <style type="text/css">
        #app{
            background-image: url({{asset('images/bg-01.jpg')}});
            padding: 15px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            width: 100%;
            min-height: 100vh;
        }
        .form-group {
            margin-bottom: 0rem !important;
        }
        .Perfect20Logo{
          border: none;
          background-color: transparent;
          width: 350px;
        }
        .welcome-note{
          color: #fff !important;
          text-align: center !important;
        }
    </style>
</head>
<body>
    <div id="app">


        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="{{asset('js/sb-admin-2.min.js')}}"></script> -->
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <!-- <script src="{{asset('js/all.min.js')}}"></script> -->

    <script>
    $(document).ready(function() {
        $('#userClass').select2({
            placeholder: "Select Your Class",
            allowClear: true,
            initSelection: function(element, callback) {
            }
        });
    });
    </script>
</body>
</html>
