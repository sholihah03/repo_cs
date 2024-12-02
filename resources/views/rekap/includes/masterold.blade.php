<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset ('assets/img/apple-icon.png')}}" /> 
    <link rel="icon" type="image/png" href="{{ asset ('assets/img/favicon.png')}}" />
    <title>Soft UI Dashboard Tailwind</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset ('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset ('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!--perfect scrollbar-->
    <link href="{{ asset ('assets/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <!-- tailwind styling -->
    <link href="{{ asset ('assets/css/soft-ui-dashboard-tailwind.css')}}" rel="stylesheet" />
    <link href="{{ asset ('assets/css/soft-ui-dashboard-tailwind.min.css')}}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset ('assets/css/soft-ui-dashboard-tailwind.css')}}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

      <!-- Navbar -->

      

      <!-- Begin Page Content -->
      @yield('content')
      <!-- End of Content Wrapper -->

    </body>
    <!-- plugin for charts  -->
    <script src="{{asset('assets/js/plugins/chartjs.min.js')}}" async></script>
    <script src="{{asset('assets/js/plugins/Chart.extension.js')}}" async></script>
    <!-- plugin for scrollbar  -->
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}" async></script>
    <!-- github button -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- main script file  -->
    <script src="{{asset('assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5')}}" async></script>
    <script src="{{asset('assets/js/chart-1.js')}}" async></script>
    <script src="{{asset('assets/js/chart-2.js')}}" async></script>
    <script src="{{asset('assets/js/dropdown.js')}}" async></script>
    <script src="{{asset('assets/js/fixed-plugin.js')}}" async></script>
    <script src="{{asset('assets/js/nav-pills.js')}}" async></script>
    <script src="{{asset('assets/js/navbar-collapse.js')}}" async></script>
    <script src="{{asset('assets/js/navbar-sticky.js')}}" async></script>
    <script src="{{asset('assets/js/perfect-scrollbar.js')}}" async></script>
    <script src="{{asset('assets/js/sidenav-burgery.js')}}" async></script>
    <script src="{{asset('assets/js/soft-ui-dashboard-tailwind.js')}}" async></script>
    <script src="{{asset('assets/js/soft-ui-dashboard-tailwind.min.js')}}" async></script>
    <script src="{{asset('assets/js/tooltips.js')}}" async></script>
</html>
