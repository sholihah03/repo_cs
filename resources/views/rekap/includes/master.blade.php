<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset ('soft/build/assets/img/apple-icon.png')}}" /> 
    <link rel="icon" type="image/png" href="{{ asset ('soft/build/assets/img/favicon.png')}}" />
    <title>Soft UI Dashboard Tailwind</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset ('soft/build/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset ('soft/build/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset ('soft/build/assets/css/soft-ui-dashboard-tailwind.css')}}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

      <!-- Navbar -->

      <!-- Begin Page Content -->
      @yield('content')
      <!-- End of Content Wrapper -->

    </body>
    <!-- plugin for charts  -->
    <script src="{{asset('soft/build/assets/js/plugins/chartjs.min.js')}}" async></script>
    <script src="{{asset('soft/build/assets/js/plugins/Chart.extension.js')}}" async></script>
    <!-- plugin for scrollbar  -->
    <script src="{{asset('soft/build/assets/js/plugins/perfect-scrollbar.min.js')}}" async></script>
    <!-- github button -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- main script file  -->
    <script src="{{asset('soft/build/assets/js/chart-1.js')}}" async></script>
    <script src="{{asset('soft/build/assets/js/chart-2.js')}}" async></script>
    <script src="{{asset('soft/build/assets/js/dropdown.js')}}" async></script>
    <script src="{{asset('soft/build/assets/js/fixed-plugin.js')}}" async></script>
    <script src="{{asset('soft/build/assets/js/nav-pills.js')}}" async></script>
    <script src="{{asset('soft/build/assets/js/navbar-collapse.js')}}" async></script>
    <script src="{{asset('soft/build/assets/js/navbar-sticky.js')}}" async></script>
    <script src="{{asset('soft/build/assets/js/perfect-scrollbar.js')}}" async></script>
    <script src="{{asset('soft/build/assets/js/sidenav-burgery.js')}}" async></script>
    <script src="{{asset('soft/build/assets/js/soft-ui-dashboard-tailwind.js')}}" async></script>
    <script src="{{asset('soft/build/assets/js/soft-ui-dashboard-tailwind.min.js')}}" async></script>
    <script src="{{asset('soft/build/assets/js/tooltips.js')}}" async></script>
</html>
