<!DOCTYPE html>
<html class="no-js h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('layouts.appheader')
  </head>
  <body class="h-100">

    <!-- Settings icon -->
    <div class="color-switcher-toggle animated pulse infinite">
      <i class="material-icons">settings</i>
    </div>

    <div class="container-fluid">
      <div class="row">

        <!-- Main Sidebar -->
        @include('inc.sidebar')

        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            @include('inc.navbar')
          </div>

          <div class="main-content-container container-fluid px-4">

              <!-- Content -->
                <main class="py-4">
                    @yield('content')
                </main>
           
          </div>

          <!-- Footer -->
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2019
              <a href="https://designrevision.com" rel="nofollow">TeamTrack</a>
            </span>
          </footer>

        </main>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="{{ asset('template/scripts/extras.1.1.0.min.js') }}"></script>
    <script src="{{ asset('template/scripts/shards-dashboards.1.1.0.min.js') }}"></script>
    <script src="{{ asset('template/scripts/app/app-blog-overview.1.1.0.js') }}"></script>

  </body>
</html>