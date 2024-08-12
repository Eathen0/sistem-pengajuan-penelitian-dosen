<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- CSS -->
   <link rel="stylesheet" href={{ asset("assets/themes/voler-main/assets/css/bootstrap.css") }}>
   <link rel="stylesheet" href={{ asset("assets/themes/voler-main/assets/vendors/chartjs/Chart.min.css") }}>
   <link rel="stylesheet" href={{ asset("assets/themes/voler-main/assets/vendors/perfect-scrollbar/perfect-scrollbar.css") }}>
   <link rel="stylesheet" href={{ asset("assets/themes/voler-main/assets/css/app.css") }}>
   <link rel="stylesheet" href={{ asset("assets/themes/voler-main/assets/vendors/choices.js/choices.min.css") }}>

   <!-- Javascript -->
   <script defer src={{ asset("assets/themes/voler-main/assets/js/feather-icons/feather.min.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/js/app.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/vendors/chartjs/Chart.min.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/vendors/apexcharts/apexcharts.min.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/js/pages/dashboard.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/js/main.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/vendors/choices.js/choices.min.js") }}></script>

   <title>@yield('title-page', 'Sistem Pengajuan Penelitian')</title>
</head>
<body>
   @yield('content')
</body>
</html>