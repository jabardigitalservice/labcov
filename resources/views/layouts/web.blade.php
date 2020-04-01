<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>LAB COVID-19 @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="LAB COVID-19 JAWA BARAT" name="description" />
        <meta content="PEMPROV JABAR" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- plugins -->
        <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.7/dist/sweetalert2.min.css">
        @notifyCss
        @yied('css')

    </head>

    <body>
        
          <!-- Begin page -->
          <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
            <div class="container-fluid">
                <!-- LOGO -->
                <a href="{{url('/')}}" class="navbar-brand mr-0 mr-md-2 logo">
                    <span class="logo-lg">
                        <span class="d-inline h5 ml-1 text-logo">LAB COVID JABAR</span>
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo.png')}}" alt="" height="24">
                    </span>
                </a>

                <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
                    
                </ul>

               
            </div>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            <div class="media user-profile mt-2 mb-2">
                <img src="{{asset('assets/images/users/avatar-7.jpg')}}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
                <img src="{{asset('assets/images/users/avatar-7.jpg')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

                <div class="media-body">
                    <h6 class="pro-user-name mt-0 mb-0">{{Auth::user()->name}}</h6>
                    <span class="pro-user-desc">@if(Auth::user()->role == 0)
                        Super Administrator
                        @elseif(Auth::user()->role == 1)
                        Register
                        @elseif(Auth::user()->role == 2)
                        Laboratorium Tingkat 1
                        @elseif(Auth::user()->role == 3)
                        Laboratorium Tingkat 2
                        @elseif(Auth::user()->role == 4)
                        Laboratorium Tingkat 3
                        @elseif(Auth::user()->role == 5)
                        Validator
                        @else
                        Administrator
                        @endif
                    </span>
                </div>
                <div class="dropdown align-self-center profile-dropdown-menu">
                    <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                        aria-expanded="false">
                        <span data-feather="chevron-down"></span>
                    </a>
                    <div class="dropdown-menu profile-dropdown">
                  
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                            <span>Settings</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="{{url('logout')}}" class="dropdown-item notify-item">
                            <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="sidebar-content">
                <!--- Sidemenu -->
                <div id="sidebar-menu" class="slimscroll-menu">
                    <ul class="metismenu" id="menu-bar">
                        <li>
                            <a href="index.html">
                                <i data-feather="home"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('registrasi')}}">
                                <i class="uil-user-square"></i>
                                <span> Registrasi </span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="uil-flask-potion "></i>
                                <span>Pemeriksaan Sample </span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="email-inbox.html">Inbox</a>
                                </li>
                                <li>
                                    <a href="email-read.html">Read</a>
                                </li>
                                <li>
                                    <a href="email-compose.html">Compose</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="uil-flask"></i>
                                <span>Ekstraksi Sample</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="project-list.html">List</a>
                                </li>
                                <li>
                                    <a href="project-detail.html">Detail</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="uil-atom"></i>
                                <span>Penelitian Sample </span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="task-list.html">List</a>
                                </li>
                                <li>
                                    <a href="task-board.html">Kanban Board</a>
                                </li>
                            </ul>
                        </li>
        
                        <li>
                            <a href="charts-apex.html" aria-expanded="false">
                                <i class="uil-search-alt "></i>
                                <span> Pelacakan Sample </span>
                            </a>
                        </li>

                       
                    </ul>
                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

  @yield('content')
  @include('notify::messages')
            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            2020 &copy; PEMPROV JABAR. All Rights Reserved.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.7/dist/sweetalert2.all.min.js"></script>
        @notifyJs
        <!-- page js -->

        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>
@yield('js')

    </body>
</html>