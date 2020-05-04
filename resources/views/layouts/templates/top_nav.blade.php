<!-- Main Navigation -->
<div class="main-nav-section">
    <div class="user-panel text-right">
        @guest
            <a href="{{ route('login') }}" class="btn btn-default font-weight-bold" style="background: #fff; color: rgba(0, 0, 0, 0.7)">
                <i class="fa fa-user-o" aria-hidden="true"></i> Sign in
            </a>

            <a href="{{ route('register') }}" class="font-weight-bold btn pull-right ml-3" style="border: 1px solid white; ">
                <i class="fa fa-user-o" aria-hidden="true"></i> Register
            </a>
        @endguest

        @auth
            @if(! (Auth::user()->role->name == "Admin staff" || Auth::user()->role->name == "GCUAVS Staff"))
                <a href="#" class="font-weight-bold" data-toggle="modal" data-target="#request">
                    <i class="fa fa-plus" aria-hidden="true"></i> Make request
                </a>
            @endif

            <a href="{{ route('logout') }}" class="font-weight-bold ml-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i> Logout </a>
            </a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
            </form>
        @endauth
    </div>
    <nav class="navbar navbar-toggleable-md fixed-top">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars navbar-toggle-btn" aria-hidden="true"></i>
        </button>
        <a class="navbar-brand" href="home-one.html">
            <h4 class="font-weight-bold text-white">AV Request</h4>
        </a>
    </nav>
</div>
<!-- main nav section -->