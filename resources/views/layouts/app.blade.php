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
    <link href="{{ asset('public/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/sb-admin-2.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/vendor/select2/select2.min.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('public/css/main.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <script src="{{asset('public/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('public/js/parsley.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/pretty-checkbox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/landing-page.css')}}">
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
          width: 350px !important;
        }
        .welcome-note{
          color: red !important;
          text-align: center !important;
        }
        p{
          color: black !important;
        }
        body{
          color: #000 !important;
          font-size: 18px;
        }
        .pretty .state label::before {
            border-color: #0d0d0d;
        }
        .breadcrumb a{
          font-size: 18px;
        }
        .btn-login{
          width: 100%;
        }
        .toggle-password{
          position: absolute;
          bottom: 10px;
          right: 15px;
        }
    </style>
</head>
<body>
    <div id="app">


        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- <script src="{{asset('js/sb-admin-2.min.js')}}"></script> -->
    <script src="{{asset('public/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{asset('public/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('public/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('public/js/sweetalert2.all.min.js')}}"></script>
    <!-- <script src="{{asset('js/all.min.js')}}"></script> -->
    <!-- <script src="{{asset('public/vendor/datatables/jquery.dataTables.min.js')}}" defer></script> -->
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <!-- <script type="text/javascript" src=" https://cdn.datatables.net/rowreorder/1.2.6/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js "></script> -->
    <script>
    $(document).ready(function() {
        $('#userClass').select2({
            placeholder: "Select Your Class",
            allowClear: true,
        });
        //$('#report-table').DataTable();
        $('#report-table')
  				.addClass( 'nowrap' )
  				.dataTable( {
  					responsive: true,
  					columnDefs: [
  						{ targets: [-1, -3], className: 'dt-body-right' }
  					]
  				} );
      $(".toggle-password").click(function() {
          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $("#password");
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
      });
    });
    </script>
</body>
</html>
