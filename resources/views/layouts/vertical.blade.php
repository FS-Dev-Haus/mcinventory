<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="mx-3">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="pro-user-name ml-1 font-14">
                    Welcome, <b>{{ auth()->user()->name }}!! </b> <i class=" la la-hand-peace-o"></i> 
                </span>
            </a>
        </li>
    </ul>
    <!-- LOGO -->
    <div class="logo-box">
        <a href="javascript: void(0);" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ secure_asset('img/verico.png') }}" alt="" height="40">
                <!-- <span class="logo-lg-text-light">Xeria</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">X</span> -->
                <img src="{{ secure_asset('img/icon.png') }}" alt="" height="30">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </li>
    </ul>
</div>
<!-- end Topbar -->

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="/items">
                        <i class="la la-cube"></i>
                        <span> Items Inventory </span>
                    </a>
                </li>

                <li>
                    <a href="/categories">
                        <i class="la la-clone"></i>
                        <span> Categories </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Others</li>

                <li>
                    <a href="{{ route('users.edit', Auth::user()->id) }}">
                        <i class="fe-user"></i>
                        <span> My Profile </span>
                    </a>
                </li>

                <li>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        <span> Logout </span>
                    </a>
                </li>
                
            </ul>

        </div>
        <!-- End Sidebar -->

        <!-- <div class="clearfix position-absolute fixed-bottom">adad</div> -->

    </div>
    <!-- Sidebar -left -->
        <div class="clearfix position-absolute fixed-bottom mb-2 text-center">
            <a href="https://github.com/FS-Dev-Haus/mcinventory" target="_blank" class="text-decoration-none text-muted">
                <i class="fe-github fa-2x"></i><br>Create your own version<br> using our code
            </a>
        </div>

</div>
<!-- Left Sidebar End -->