<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>ComCart</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/assets/images/favicon.png" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Open+Sans:300,400,600,700"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['/assets/css/fonts.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/azzara.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/assets/css/demo.css">
</head>
<body>
    <div class="wrapper">
        <!--
            Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
        -->
        <div class="main-header" data-background-color="blue">
            <!-- Logo Header -->
            <div class="logo-header">
                
                <a href="index.html" class="logo">
                    <img src="/assets/images/logo/logo-2.png" alt="" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg">
                
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="/assets/images/user-icon.png" alt="" class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="/assets/images/user-icon.png" alt="image profile" class="avatar-img rounded"></div>
                                        <div class="u-text">
                                            <h4>Hizrian</h4>
                                            <p class="text-muted">hello@example.com</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">My Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            
            <div class="sidebar-background"></div>
            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav">
                        <li class="nav-item {{ (request()->is('admin')) ? 'active' : '' }}">
                            <a href="/admin">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                                <span class="badge badge-count">5</span>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Components</h4>
                        </li>
                        <li class="nav-item {{ (request()->is('*categories')) ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#category_nav">
                                <i class="fas fa-layer-group"></i>
                                <p>Categories</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse {{ (request()->is('*categories')) ? 'show' : '' }}" id="category_nav">
                                <ul class="nav nav-collapse">
                                    <li class="{{ (request()->is('categories')) ? 'active' : '' }}">
                                        <a href="/categories">
                                            <span class="sub-item">Manage Category</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->is('*subcategories')) ? 'active' : '' }}">
                                        <a href="/subcategories">
                                            <span class="sub-item">Manage Sub-Category</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            @yield('main')
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="/assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="/assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="/assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="/assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Bootstrap Toggle -->
<script src="/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="/assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="/assets/js/ready.min.js"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="/assets/js/setting-demo.js"></script>

@yield('jsscript')

</body>
</html>