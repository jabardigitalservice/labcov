<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>LAB COVID-19</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="LAB COVID-19 PEMPROV JABAR" name="description" />
        <meta content="PEMPROV JABAR" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        @yield('css')

    </head>

    <body class="authentication-bg">
       @yield('content')
        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>
    @yield('js')
    </body>
</html>