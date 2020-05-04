<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from eorrangeshop.com/html/listingGeo/dashboard-all-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Aug 2018 12:11:55 GMT -->
<head>
    <meta charset="UTF-8">
    <title>SSD COURSEWORK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="location listing creative">
    <meta name="author" content="CodePassenger">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" type='text/css'>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lobipanel.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.bxslider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <style>
        @yield("css")

        .page-container-wrap {
            width: 100% !important;
            margin-left: 0 !important;
            position: none !important;
            -webkit-transform: none !important;
            -moz-transform: none !important;
            -ms-transform: none !important;
            -o-transform: none !important;
            transform: none !important;
            top: 50px;
        }
        
    </style>
</head>

<body class="dashboard">
    <div class="main-wrap">
        
        @include("layouts.templates.top_nav")
        
        <div class="page-container-wrap">
            @yield('content')
        </div>

    </div>
    
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.bxslider.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/lobipanel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.accordion.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    
    <!-- Tinymce-JS -->
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>
    <!-- Google-map -->
    <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyAmiJjq5DIg_K9fv6RE72OY__p9jz0YTMI') }}"></script>
    <script src="{{ asset('assets/js/gmap3.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    
    @yield("js")
</body>

</html>