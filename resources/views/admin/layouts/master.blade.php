<!DOCTYPE html>

<html
  lang="en"
  class="layout-navbar-fixed light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

   


    <title>@yield('title')</title>

    <meta name="description" content="" />

    @include('admin.layouts.scripts.css')

    <!-- Page CSS -->
    @stack('custom-css-scripts')

    <!-- Helpers -->
    <script src="{{ asset('admin/js/helpers.js') }}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    @yield('login')

    @if(auth()->guard('admin')->check())
      <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
          <!-- Menu -->

              @include('admin.layouts.aside')

          <!-- / Menu -->

          <!-- Layout container -->
          <div class="layout-page">
          <!-- Navbar -->

          <!-- Menu -->
              @include('admin.layouts.header')
          <!-- / Menu -->

          <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
              <!-- Content -->
              <div class="container-xxl flex-grow-1 container-p-y">
                  @yield('content')
              </div>
              <!-- / Content -->
              <!-- Footer -->
                @include('admin.layouts.footer')
              <!-- / Footer -->

              <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
          </div>
          <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
      </div>
    @endif
    <!-- / Layout wrapper -->

    @include('admin.layouts.scripts.js')

    @stack('custom-js-scripts')

  </body>
</html>
