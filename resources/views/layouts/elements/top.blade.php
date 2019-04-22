<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @if (Route::has('login'))
                            @auth
                            <li><a href="/admin"><i>Hello <b>{{ Auth::user()->name }}</b>!</i></a></li>
                            @else
                            <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> Login</a></li>

                            @if (Route::has('register'))
                            <li><a href="{{ route('register') }}"><i class="fa fa-user"></i> Register</a></li>
                            @endif
                            @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Products</a></li>
                                    <li><a href="#">Product Details</a></li>
                                    <li><a href="#">Checkout</a></li>
                                    <li><a href="#">Cart</a></li>
                                    <li><a href="#">Login</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Blog List</a></li>
                                    <li><a href="#">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="#">404</a></li>
                            <li><a href="#">Contact</a></li>
                            <li class="dropdown dropdown-notifications">
                                <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                                    <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
                                </a>
                                <div class="dropdown-container">
                                    <div class="dropdown-toolbar">
                                        <div class="dropdown-toolbar-actions">
                                            <a href="#">Mark all as read</a>
                                        </div>
                                        <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h3>
                                    </div>
                                    <ul class="dropdown-menu">
                                    </ul>
                                    <div class="dropdown-footer text-center">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form role="search" method="get" id="searchform" action="{{ route('search') }}">
                            <input type="text" value="" name="key" id="s" placeholder="Search..." class="form-control">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
<!--/header-->