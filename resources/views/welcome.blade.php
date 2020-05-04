<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from eorrangeshop.com/html/listingGeo/dashboard-all-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Aug 2018 12:11:55 GMT -->
<head>
    <meta charset="UTF-8">
    <title>ListingGEO - Directory Listing Template</title>
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
</head>
<body class="dashboard">
    <div class="main-wrap">
        <!-- Main Navigation -->
        <div class="main-nav-section">
            <div class="user-panel">
                <a href="login.html" class="user-login-btn border-btn">
                    <i class="fa fa-user-o" aria-hidden="true"></i> Log in
                </a>
                <a href="add-listing.html" class="user-addlisting-btn">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add Listing
                </a>
            </div>
            <nav class="navbar navbar-toggleable-md fixed-top">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars navbar-toggle-btn" aria-hidden="true"></i>
                </button>
                <a class="navbar-brand" href="home-one.html">
                    <img src="images/logo.png" alt="img" class="img-responsive">
                </a>
                <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="listing-map-left.html" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Explore
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                                <li><a class="dropdown-item" href="listing-map-left.html">Map Left</a></li>
                                <li><a class="dropdown-item" href="listing-map-right.html">Map Right</a></li>
                                <li><a class="dropdown-item" href="listing-map-full.html">Map Fullwidth</a></li>
                                <li><a class="dropdown-item" href="single-listing.html">Listing Details</a></li>
                                <li><a class="dropdown-item" href="add-listing.html">Add Listing</a></li>
                                <li><a class="dropdown-item" href="favorite-listing.html">Favorite Listings</a></li>
                                <li><a class="dropdown-item" href="single.html">Single</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="home-one.html" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pages
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                <li><a class="dropdown-item" href="home-one.html">Home One</a></li>
                                <li><a class="dropdown-item" href="home-two.html">Home Two</a></li>
                                <li><a class="dropdown-item" href="about.html">About Us</a></li>
                                <li><a class="dropdown-item" href="working-process.html">How It Works</a></li>
                                <li><a class="dropdown-item" href="packages.html">Listing Package</a></li>
                                <li><a class="dropdown-item" href="gallery.html">Photo Gallery</a></li>
                                <li><a class="dropdown-item" href="contact.html">Contact Us</a></li>
                                <li><a class="dropdown-item" href="404.html">404</a></li>
                            </ul>
                        </li>
                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="dshboard.html" id="navbarDropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dashboard
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                                <li><a class="dropdown-item" href="dashboard.html">Dashboard</a></li>
                                <li><a class="dropdown-item" href="dashboard-all-listing.html">All listings</a></li>
                                <li><a class="dropdown-item" href="dashboard-new-listing.html">Add new listings</a></li>
                                <li><a class="dropdown-item" href="dashboard-active-listing.html">Active Listings</a></li>
                                <li><a class="dropdown-item" href="dashboard-expired-listing.html">Expired Listings</a></li>
                                <li><a class="dropdown-item" href="dashboard-favorites-listing.html">My Favorites</a></li>
                                <li><a class="dropdown-item" href="dashboard-all-review.html">All Reviews</a></li>
                                <li><a class="dropdown-item" href="dashboard-my-review.html">My Reviews</a></li>
                                <li><a class="dropdown-item" href="dashboard-all-message.html">All Messages</a></li>
                                <li><a class="dropdown-item" href="dashboard-unread-message.html">Unread Messages</a></li>
                                <li><a class="dropdown-item" href="dashboard-checkout.html">Checkout</a></li>
                                <li><a class="dropdown-item" href="dashboard-package-plan.html">Package Plan</a></li>
                                <li><a class="dropdown-item" href="dashboard-invoices.html">Invoices</a></li>
                                <li><a class="dropdown-item" href="dashboard-add-campaign.html">Add Campaign</a></li>
                                <li><a class="dropdown-item" href="dashboard-claim-refund.html">Claim & Refund</a></li>
                                <li><a class="dropdown-item" href="dashboard-settings.html">Settings</a></li>
                                <li><a class="dropdown-item" href="dashboard-profile.html">My Profile</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- main nav section -->
        <a href="#" id="slide-nav-trigger" class="slide-nav-trigger">
            <i class="fa fa-bars" aria-hidden="true"></i>
            Dashboard Navigation
        </a>
        {{-- <div class="slide-menu-wrap">
            <nav id="cbp-spmenu-s1" class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left">
                <div class="user-profile-block">
                    <div>
                        <div class="user-thumb">
                            <img src="images/misc/9.jpg" alt="img" class="img-responsive">
                        </div>
                        <div class="user-info">
                            <h5>
                                Robert Smith
                            </h5>
                            <span>UI Designer</span>
                        </div>
                    </div>
                    <a href="#" class="listing-btn-cmn">Update Profile</a>
                </div>
                <div class="accordion-menu responsive-menu" data-accordion-group>
                    <div class="slide-navigation-wrap">
                        <div class="nav-item">
                            <a href="dashboard.html">
                                <span class="menu-icon-wrap icon ti-layers-alt"></span>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </div>
                    </div>
                    <div class="slide-navigation-wrap" data-accordion>
                        <div class="nav-item has-sub" data-control>
                            <a href="javascript:void(0)">
                                <span class="menu-icon-wrap icon ti-location-pin"></span>
                                <span class="menu-title">My Listing</span>
                            </a>
                        </div>
                        <div class="menu-content" data-content>
                            <div class="nav-item">
                                <a href="dashboard-all-listing.html">
                                    <span class="menu-icon-wrap bullet"></span>
                                    <span class="menu-title">All listings</span>
                                </a>
                            </div>
                            <div class="nav-item">
                                <a href="dashboard-new-listing.html">
                                    <span class="menu-icon-wrap bullet"></span>
                                    <span class="menu-title">Add new listings</span>
                                </a>
                            </div>
                            <div class="nav-item">
                                <a href="dashboard-active-listing.html">
                                    <span class="menu-icon-wrap bullet"></span>
                                    <span class="menu-title">Active Listings</span>
                                </a>
                            </div>
                            <div class="nav-item">
                                <a href="dashboard-expired-listing.html">
                                    <span class="menu-icon-wrap bullet"></span>
                                    <span class="menu-title">Expired Listings</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="slide-navigation-wrap">
                        <div class="nav-item">
                            <a href="dashboard-favorites-listing.html">
                                <span class="menu-icon-wrap icon ti-heart"></span>
                                <span class="menu-title">My Favorites</span>
                            </a>
                        </div>
                    </div>
                    <div class="slide-navigation-wrap" data-accordion>
                        <div class="nav-item has-sub" data-control>
                            <a href="javascript:void(0)">
                                <span class="menu-icon-wrap icon ti-comment-alt"></span>
                                <span class="menu-title">Reviews</span>
                            </a>
                        </div>
                        <div class="menu-content" data-content>
                            <div class="nav-item">
                                <a href="dashboard-all-review.html">
                                    <span class="menu-icon-wrap bullet"></span>
                                    <span class="menu-title">All Reviews</span>
                                </a>
                            </div>
                            <div class="nav-item">
                                <a href="dashboard-my-review.html">
                                    <span class="menu-icon-wrap bullet"></span>
                                    <span class="menu-title">My Reviews</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="slide-navigation-wrap" data-accordion>
                        <div class="nav-item has-sub" data-control>
                            <a href="javascript:void(0)">
                                <span class="menu-icon-wrap icon ti-email"></span>
                                <span class="menu-title">Messages</span>
                            </a>
                            <div class="menu-badge-wrap">
                                <span class="menu-badge">5</span>
                            </div>
                        </div>
                        <div class="menu-content" data-content>
                            <div class="nav-item">
                                <a href="dashboard-all-message.html">
                                    <span class="menu-icon-wrap bullet"></span>
                                    <span class="menu-title">All Messages</span>
                                </a>
                            </div>
                            <div class="nav-item">
                                <a href="dashboard-unread-message.html">
                                    <span class="menu-icon-wrap bullet"></span>
                                    <span class="menu-title">Unread Messages</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="slide-navigation-wrap" data-accordion>
                        <div class="nav-item has-sub" data-control>
                            <a href="javascript:void(0)">
                                <span class="menu-icon-wrap icon ti-gift"></span>
                                <span class="menu-title">Packages</span>
                            </a>
                        </div>
                        <div class="menu-content" data-content>
                            <div class="nav-item">
                                <a href="dashboard-checkout.html">
                                    <span class="menu-icon-wrap bullet"></span>
                                    <span class="menu-title">Checkout</span>
                                </a>
                            </div>
                        </div>
                        <div class="menu-content" data-content>
                            <div class="nav-item">
                                <a href="dashboard-package-plan.html">
                                    <span class="menu-icon-wrap bullet"></span>
                                    <span class="menu-title">Package Plan</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="slide-navigation-wrap">
                        <div class="nav-item">
                            <a href="dashboard-invoices.html">
                                <span class="menu-icon-wrap icon ti-clipboard"></span>
                                <span class="menu-title">Invoices</span>
                            </a>
                        </div>
                    </div>
                    <div class="slide-navigation-wrap">
                        <div class="nav-item">
                            <a href="dashboard-add-campaign.html">
                                <span class="menu-icon-wrap icon ti-check-box "></span>
                                <span class="menu-title">Add Campaign</span>
                            </a>
                        </div>
                    </div>
                    <div class="slide-navigation-wrap">
                        <div class="nav-item">
                            <a href="dashboard-claim-refund.html">
                                <span class="menu-icon-wrap icon ti-pencil-alt"></span>
                                <span class="menu-title">Claim & Refund</span>
                            </a>
                        </div>
                    </div>
                    <div class="slide-navigation-wrap">
                        <div class="nav-item">
                            <a href="dashboard-settings.html">
                                <span class="menu-icon-wrap icon ti-settings"></span>
                                <span class="menu-title">Settings</span>
                            </a>
                        </div>
                    </div>
                    <div class="slide-navigation-wrap">
                        <div class="nav-item">
                            <a href="dashboard-profile.html">
                                <span class="menu-icon-wrap icon ti-user"></span>
                                <span class="menu-title">My Profile</span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div> --}}
        <!-- Slide Menu Section -->
        <div class="page-container-wrap">
            <div class="container-fluid">
                <div class="listing-filter-wrap">
                  
                <div class="single-post-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="review-section">
                            <div class="review-title-block">
                                <h4><strong>Hotel California</strong></h4>
                                <br>
                                <div class="row mt-2">
                                    <div class="col">
                                        <h5 style="border-bottom: 2px solid white" class="my-2 pb-2 text-info font-weight-bold clearfix">General details:</h5>

                                        <div class="row my-2 pb-2" style="padding-left: 15.5px;">
                                            <div class="p-0 mr-2">
                                                <b>Requested date:</b> 12 jun 2020
                                            </div>
                                            <div class="p-0 mr-2">
                                                <b>Status:</b> <span class="text-danger font-weight-bold"> closed</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5 style="border-bottom: 2px solid white" class="my-2 pb-2 text-info font-weight-bold clearfix">Requested items:</h5>

                                        <div class="row my-2 pb-2" style="padding-left: 15.5px;">
                                            <div class="p-0 mr-2">
                                                <i class="fa fa-bed" aria-hidden="true"></i> Hotel & Restaurent,
                                            </div>
                                            <div class="p-0 mr-2">
                                                <i class="fa fa-bed" aria-hidden="true"></i> Hotel & Restaurent,
                                            </div>
                                            <div class="p-0 mr-2">
                                                <i class="fa fa-bed" aria-hidden="true"></i> Hotel & Restaurent,
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <h5 style="border-bottom: 2px solid white" class="my-2 pb-2 text-info font-weight-bold clearfix">Requested by:</h5>

                                        <div class="row my-2 pb-2" style="padding-left: 15.5px;">
                                                <img src="images/post/author/1.jpg" style="width: 55px !important; height: 55px !important; border-radius: 50%;" alt="img" class="img-circle d-inline-block img-responsive">
                                                <p class="post-entry d-inline ml-3 mt-3" style="font-size: 15.4px; color: rgba(0, 0, 0, 0.7)">
                                                    <b>ticio victoriano</b>
                                                </p>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <h5 style="border-bottom: 2px solid white" class="my-2 pb-2 text-info font-weight-bold clearfix">Assigned to:</h5>

                                       <!--  <div class="row my-2 pb-2" style="padding-left: 15.5px;">
                                                <img src="images/post/author/1.jpg" style="width: 55px !important; height: 55px !important; border-radius: 50%;" alt="img" class="img-circle d-inline-block img-responsive">
                                                <p class="post-entry d-inline ml-3 mt-3" style="font-size: 15.4px; color: rgba(0, 0, 0, 0.7)">
                                                    <b>ticio victoriano</b>
                                                </p>
                                        </div> -->

                                        <button class="btn font-weight-bold text-white btn-lg" style="background: #fd880a"> assign staff </button>
                                    </div>
                                </div>
                            </div>
                            <div class="comments listing-reviews">
                                <ul class="p-5" style="box-shadow: 0px 1px 11px -1px rgba(216, 216, 216, 0.75);">
                                    <li>
                                        <div class="avatar-block">
                                            <img src="images/post/author/5.jpg" alt="img" class="img-responsive">
                                            <div class="comment-by">
                                                <h4><a href="javascript:void(0)">Oliver liam</a></h4>
                                            </div>
                                        </div>
                                        <div class="review-content">
                                            <h4>It was an awesome experience</h4>
                                            <div class="meta">
                                                <span class="date">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                25 December 2018 
                                            </span>
                                                <span class="time">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                10:35pm
                                            </span>
                                            </div>

                                            <div class="review-entry">
                                                <p class="text-justify">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                                </p>
                                            </div>

                                            <div class="rate-review-block">
                                                <h5>Was this comment helpful to you?</h5>
                                                <div class="btn-group">
                                                    <a href="javascript:void(0)" class="rate-btn toggole-contnet">
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Yes
                                                    </a>
                                                    <a href="javascript:void(0)" class="rate-btn toggole-contnet">
                                                        <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> No
                                                    </a>
                                                </div>

                                                <a href="javascript:void(0)" class="report-link text-danger">
                                                    <b>Report Abuse</b>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a type="button" class="btn-default font-weight-bold text-white listing-btn-cmn pull-right">add comment</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                </div>

                <div class="col-md-12">
                    <footer>
                        <div class="footer-bottom-block">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h5 class="copyright-text">Copyright 2020</h5>
                                        <h4 class="my-3 copyright-text">GCU-ALU Security Software Development</h4>
                                        <h5 class="copyright-text">All Rights Reserved</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
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
    
    <script type="text/javascript">
        function listingModalMap(selector,centerLatLng,markerLatLng){
            $(selector).gmap3({
                map: {
                    options: {
                        zoom: 6,
                        center: [centerLatLng.lat, centerLatLng.lng],
                        mapTypeControl: true,
                        mapTypeControlOptions: {
                            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                        },
                        mapTypeId: "style1",
                        mapTypeControlOptions: {
                            mapTypeIds: [google.maps.MapTypeId.ROADMAP, "style1"]
                        },
                        navigationControl: true,
                        scrollwheel: false,
                        streetViewControl: true
                    }
                },
                marker: {
                    latLng: [markerLatLng.lat, markerLatLng.lng],
                    options: {animation:google.maps.Animation.BOUNCE, icon: 'images/markers/listing-post-pointer.png' }
                },
                styledmaptype: {
                    id: "style1",
                    options: {
                        name: "Style 1"
                    }
                }
            });
        }
        var centerLatLng = {
            lat: 44.785091,
            lng: -79.968285
        };
        var markerLatLng = {
            lat: 40.785091,
            lng: -73.968285
        };
        listingModalMap('#listing_post_map_one',centerLatLng,markerLatLng);
        listingModalMap('#listing_post_map_two',centerLatLng,markerLatLng);
        listingModalMap('#listing_post_map_three',centerLatLng,markerLatLng);
        listingModalMap('#listing_post_map_four',centerLatLng,markerLatLng);
        listingModalMap('#listing_post_map_five',centerLatLng,markerLatLng);
        listingModalMap('#listing_post_map_six',centerLatLng,markerLatLng);
    </script>
</body>

<!-- Mirrored from eorrangeshop.com/html/listingGeo/dashboard-all-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Aug 2018 12:11:55 GMT -->
</html>