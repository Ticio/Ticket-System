<div class="slide-menu-wrap">
    <nav id="cbp-spmenu-s1" class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left">
        <div class="user-profile-block">
            <div>
                <div class="user-thumb">
                    <img src="{{ Auth::user()->getPhoto() }} " alt="img" class="img-responsive">
                </div>
                <div class="user-info">
                    <h5 class="font-weight-bold">
                        {{ Auth::user()->name }}
                    </h5>
                </div>
            </div>
        </div>

        <div class="accordion-menu responsive-menu" data-accordion-group>

            @if(Auth::user()->role->name == "Admin staff" || Auth::user()->role->name == "GCUAVS Staff")
                <div class="slide-navigation-wrap">
                    <div class="nav-item">
                        <a href="{{ route('home') }}">
                            <span class="menu-icon-wrap icon ti-layers-alt"></span>
                            <span class="menu-title">Tickets</span>
                        </a>
                    </div>
                </div>
            @else
                <div class="slide-navigation-wrap">
                    <div class="nav-item">
                        <a href="{{ route('home') }}">
                            <span class="menu-icon-wrap icon ti-layers-alt"></span>
                            <span class="menu-title">My Requests</span>
                        </a>
                    </div>
                </div>
            @endif
            
            <div class="slide-navigation-wrap">
                <div class="nav-item">
                    <a href="{{ route('profile') }}">
                        <span class="menu-icon-wrap icon ti-user"></span>
                        <span class="menu-title">Profile</span>
                    </a>
                </div>
            </div>
            
            <div class="{{ route('home') }}">
                <div class="nav-item">
                    <a href="{{ route('logout') }}">
                        <span class="menu-icon-wrap icon ti-settings" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></span>
                        <span class="menu-title">Logout</span>
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Slide Menu Section -->