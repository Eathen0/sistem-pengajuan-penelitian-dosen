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
   <link rel="stylesheet" href={{ asset("assets/themes/voler-main/assets/vendors/simple-datatables/style.css") }}>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
   <link rel="stylesheet" href={{ asset("assets/themes/NiceAdmin/assets/vendor/quill/quill.snow.css") }}>
   <link rel="stylesheet" href={{ asset("assets/themes/NiceAdmin/assets/vendor/quill/quill.bubble.css") }}>

   <!-- Javascript -->
   <script defer src={{ asset("assets/themes/voler-main/assets/js/feather-icons/feather.min.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/js/app.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/vendors/chartjs/Chart.min.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/vendors/apexcharts/apexcharts.min.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/js/pages/dashboard.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/js/main.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/vendors/choices.js/choices.min.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/vendors/simple-datatables/simple-datatables.js") }}></script>
   <script defer src={{ asset("assets/themes/voler-main/assets/js/vendors.js") }}></script>
   <script defer src={{ asset("assets/themes/NiceAdmin/assets/vendor/quill/quill.min.js") }}></script>

   {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
   <script>
   tinymce.init({
      selector: '#dafault-editor'
   });
   </script> --}}
   <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <title>@yield('title-page', 'Sistem Pengajuan Penelitian')</title>
</head>
<body>
   @yield('content')
</body>
</html>