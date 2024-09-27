<!DOCTYPE html>
<html>
  <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    @extends('rekap.includes.master')
    @include('rekap.includes.sidenav')

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
      <!-- Navbar -->

      <!-- Begin Page Content -->
      @yield('content')
      <!-- End of Content Wrapper -->

    </body>
    <!-- plugin for charts  -->
    <script src="{{asset('soft/assets/js/plugins/chartjs.min.js')}}" async></script>
    <!-- plugin for scrollbar  -->
    <script src="{{asset('soft/assets/js/plugins/perfect-scrollbar.min.js')}}" async></script>
    <!-- github button -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- main script file  -->
    <script src="{{asset('soft/assets/js/soft-ui-dashboard-tailwind.js')}}" async></script>
  </html>
