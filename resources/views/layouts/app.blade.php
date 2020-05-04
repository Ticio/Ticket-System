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

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" type='text/css'>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lobipanel.min.css') }}">

    <!-- BX Slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.bxslider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tether.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">

    <style>
        @yield("css")
    </style>
</head>
<body class="dashboard">
    <div class="main-wrap">
        
        <!-- Top Navigation -->
        @include("layouts.templates.top_nav")

         <!-- Top Navigation -->
        @include("layouts.templates.side_nav")

        <!-- Slide Menu Section -->
        <div class="page-container-wrap">
            @yield('content')
        </div>

        <!-- Top Navigation -->
        @include("layouts.templates.footer")

    </div>
    
    <div id="request" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title text-info text-lowercase font-weight-bold text-center w-100" id="gridModalLabel">request equipment</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <div class="form-block">
                        <form class="form-common" action="{{ route('request') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="formGroupExampleInput">Title</label>
                                <input class="form-control" type="text" name="name" placeholder="request title" required>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label for="formGroupExampleInput">Equipments</label>
                                    <select name="equipment" class="form-control" required>
                                        @foreach (App\Equipment::all() as $equip)
                                            <option value="{{ $equip->id }}"> {{ $equip->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="formGroupExampleInput">Priority</label>
                                    <select name="priority_id" class="form-control" required>
                                        @foreach (App\TicketPriority::all() as $equip)
                                            <option value="{{ $equip->id }}"> {{ $equip->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col">
                                    <label for="formGroupExampleInput">Pickup Date</label>
                                    <input type="date" name="pickup_date" value="" class="form-control" required>
                                </div>

                                <div class="form-group col">
                                    <label for="formGroupExampleInput">Handover Date</label>
                                    <input type="date" name="handover_date" value="" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-btn-block my-4">
                                <button type="submit" class="btn font-weight-bold btn-info">Request</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
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
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>

    <script>
         @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";

            switch(type){
               case 'info':
                  toastr.info("{{ Session::get('message') }}");
                  break;
               case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;
               case 'warning':
                  toastr.warning("{{ Session::get('message') }}");
                  break;
               case 'error':
                  toastr.error("{{ Session::get('message') }}");
                  break;
            }
         @endif
      </script>
    
    @yield("js")
</body>

</html>