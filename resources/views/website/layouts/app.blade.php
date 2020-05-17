<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta name="keywords" content="life snacks, lifesnacks, egypt snacks, snacks in egypt, healthy snacks in egypt">
    <meta name="description" content="LifeSnacks is aiming to be the ultimate feel-good snack provider that satisfies your empty stomach instantly in the non-guiltiest way possibl">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('website/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('website/css/custom.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Add latest jQuery and fancybox files -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    @yield('css')

</head>

<body>

  @include('website.partials.header')

  @yield('content')

  @include('website.partials.footer')



  <!-- ALL JS FILES -->
  <script src="{{asset('website/js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('website/js/jquery-ui.js')}}"></script>
  <script src="{{asset('website/js/popper.min.js')}}"></script>
  <script src="{{asset('website/js/bootstrap.min.js')}}"></script>
  <!-- ALL PLUGINS -->
  <script src="{{asset('website/js/jquery.superslides.min.js')}}"></script>
  <script src="{{asset('website/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('website/js/jquery.zoom.min.js')}}"></script>
  <script src="{{asset('website/js/bootstrap-select.js')}}"></script>
  <script src="{{asset('website/js/inewsticker.js')}}"></script>
  <script src="{{asset('website/js/bootsnav.js')}}"></script>
  <script src="{{asset('website/js/images-loded.min.js')}}"></script>
  <script src="{{asset('website/js/isotope.min.js')}}"></script>
  <script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('website/js/baguetteBox.min.js')}}"></script>
  <script src="{{asset('website/js/form-validator.min.js')}}"></script>
  <script src="{{asset('website/js/contact-form-script.js')}}"></script>
  <script src="{{asset('website/js/custom.js')}}"></script>

  <script src="{{asset('website/js/sweetalert2.all.min.js')}}"></script>
  @include('website.partials.js.sweetalert')

  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    function submitLogoutForm(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    };
  </script>

  @yield('js')
</body>

</html>
