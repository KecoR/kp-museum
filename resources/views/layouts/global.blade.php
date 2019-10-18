<?php

  error_reporting(0);

  include "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>Museum Seni Rupa Dan Keramik</title>

  <link rel="stylesheet" href="{{ asset('dist/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/modules/summernote/summernote-lite.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/flag-icon-css/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/demo.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="ion ion-search"></i></a></li>
          </ul>
          <!-- <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn" type="submit"><i class="ion ion-search"></i></button>
          </div> -->
        </form>
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Museum Seni Rupa Dan Keramik</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active">
              <a href="{{ route('home') }}"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Components</li>
            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-ios-albums-outline"></i><span>Data Pengunjung</span></a>
              <ul class="menu-dropdown">
                <li><a href="{{ route('dataPengunjungNow') }}"><i class="ion ion-ios-circle-outline"></i> Data Pengunjung Hari Ini</a></li>
                <li><a href="{{ route('dataPengunjung') }}"><i class="ion ion-ios-circle-outline"></i> Data Pengunjung</a></li>
              </ul>
            </li>
            <li>
              <a href="{{ route('inputPengunjung') }}"><i class="ion ion-clipboard"></i><span>Input Pengunjung</span></a>
            </li>
        </aside>
      </div>
      <div class="main-content">
        <section class="section">
            @if (\Route::current()->getName() == 'home' || \Route::current()->getName() == '')
            <div class="row">
              <div class="col-md-12">
                <h1 class="section-header">
                  <div>Dashboard</div>
                </h1>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-12">
                    <div class="card card-sm-3" style="display:flex; align-items:center;" >
                      <a href="{{ route('inputPengunjung') }}">
                      <div class="card-icon bg-primary">
                        <i class="fas fa-user-plus"></i>
                      </div>
                      </a>
                      <div class="card-wrap">
                        <div class="card-header" style="padding-top: 0;">
                          Input Data Pengunjung
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-6">
                    <div class="card card-sm-3" style="display:flex; align-items:center;" >
                      <a href="{{ route('dataPengunjung') }}">
                      <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                      </div>
                      </a>
                      <div class="card-wrap">
                        <div class="card-header" style="padding-top: 0;">
                          View Data Pengunjung
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-6">
                    <div class="card card-sm-3" style="display:flex; align-items:center;" >
                      <a href="{{ route('dataPengunjungNow') }}">
                      <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                      </div>
                      </a>
                      <div class="card-wrap">
                        <div class="card-header" style="padding-top: 0;">
                          View Data Pengunjung Hari Ini
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
            @else
                @yield('content')
            @endif
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://multinity.com/">Multinity</a>
        </div>
        <div class="footer-right"></div>
      </footer>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{ asset('dist/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('dist/modules/popper.js') }}"></script>
  <script src="{{ asset('dist/modules/tooltip.js') }}"></script>
  <script src="{{ asset('dist/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('dist/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
  <script src="{{ asset('dist/js/sa-functions.js') }}"></script>
  
  <script src="{{ asset('dist/modules/chart.min.js') }}"></script>
  <script src="{{ asset('dist/modules/summernote/summernote-lite.js') }}"></script>
  <script src="{{ asset('dist/js/scripts.js') }}"></script>
  <script src="{{ asset('dist/js/custom.js') }}"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  @yield('js')
</body>
</html>