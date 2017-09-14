<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @yield('style')
    <!-- Bootstrap 3.3.7 -->
	  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
	  <!-- AdminLTE Skins. Choose a skin from the css/skins
	       folder instead of downloading all of them to reduce the load. -->
	  <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
	  <!-- Morris chart -->
	  <link rel="stylesheet" href="{{ asset('css/morris.css') }}">
	  <!-- jvectormap -->
	  <link rel="stylesheet" href="{{ asset('css/jquery-jvectormap.css') }}">
	  <!-- Date Picker -->
	  <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
	  <!-- Daterange picker -->
	  <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
	  <!-- bootstrap wysihtml5 - text editor -->
	  <link rel="stylesheet" href="{{ asset('css/bootstrap3-wysihtml5.min.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<body>
    @include('frontend.partials.header')

    <div class="container">
    	@include('frontend.partials.menu_header')

    	<div class="row">
    		@include('frontend.partials.sidebar')

    		@yield('content')
    	</div>
    	<section class="our_client">
			<hr class="soften"/>
			<h4 class="title cntr"><span class="text">Manufactures</span></h4>
			<hr class="soften"/>
			<div class="row">
				<div class="span2">
					<a href="#"><img alt="" src="assets/img/1.png"></a>
				</div>
				<div class="span2">
					<a href="#"><img alt="" src="assets/img/2.png"></a>
				</div>
				<div class="span2">
					<a href="#"><img alt="" src="assets/img/3.png"></a>
				</div>
				<div class="span2">
					<a href="#"><img alt="" src="assets/img/4.png"></a>
				</div>
				<div class="span2">
					<a href="#"><img alt="" src="assets/img/5.png"></a>
				</div>
				<div class="span2">
					<a href="#"><img alt="" src="assets/img/6.png"></a>
				</div>
			</div>
		</section>
    </div>
    <!-- Scripts -->
    <!-- jQuery 3 -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<!-- Morris.js charts -->
	<script src="{{ asset('js/raphael.min.js') }}"></script>
	<script src="{{ asset('js/morris.min.js') }}"></script>
	<!-- Sparkline -->
	<script src="{{ asset('js/jquery.sparkline.min.js') }}"></script>
	<!-- jvectormap -->
	<script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
	<script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
	<!-- jQuery Knob Chart -->
	<script src="{{ asset('js/jquery.knob.min.js') }}"></script>
	<!-- daterangepicker -->
	<script src="{{ asset('js/moment.min.js') }}"></script>
	<script src="{{ asset('js/daterangepicker.js') }}"></script>
	<!-- datepicker -->
	<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="{{ asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<!-- Slimscroll -->
	<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
	<!-- FastClick -->
	<script src="{{ asset('js/fastclick.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('js/adminlte.min.js') }}"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="{{ asset('js/dashboard.js') }}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{ asset('js/demo.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    @yield('script');
</body>
</html>