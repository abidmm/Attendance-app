<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') | Attendance-app </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset("theme/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset('theme/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('theme/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('theme/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('theme/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('theme/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('theme/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('theme/css/style.css')}}" rel="stylesheet">

</head>

<body>
    @include('includes.header')
    
    @include('includes.sidebar')
    <main id="main" class="main">
        @yield('content')
    </main>
   


  <!-- Vendor JS Files -->
  <script src="{{asset('theme/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('theme/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('theme/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('theme/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('theme/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('theme/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('theme/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('theme/js/main.js')}}"></script>
</body>

</html>
