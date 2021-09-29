<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Sistem Inventory Sepatu</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
	<link rel="stylesheet" href="{{ asset('vendors/toastr/toastr.min.css')}}">
	@toastr_css
	<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('vendors/toastr/toastr.min.js') }}"></script>
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
	@yield('css')
</head>
<body class=" layout-top-nav" >
	<div class="wrapper" >
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand-md navbar-orange navbar-dark">
			<div class="container">
				<a href="/" class="navbar-brand">
					<img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
					style="opacity: .8">
					<span class="brand-text font-weight-light">SITU</span>
				</a>

				<!-- Right navbar links -->
				<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
					<!-- Messages Dropdown Menu -->
					<li class="nav-item dropdown">
						<li class="nav-item">
							<a href="{{ action('FrontController@index') }}" class="nav-link"><b>Tracking</b></a>
						</li>	
						<li class="nav-item">
							<a href="{{ route('login') }}" class="nav-link"><b>Login</b></a>
						</li>
					</li>
				</ul>
			</div>
		</nav>
		<!-- /.navbar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper" style="background: url({{ asset('img/bg-3.jpg')}}) no-repeat; background-size: cover;background-position: top;">


			<!-- Main content -->
			<div class="content">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col">
							@yield('content')
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->



	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
	<!-- Bootstrap 4 -->
	<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
	@yield('js')
	@toastr_js
	@toastr_render
	<script>
		@if(count($errors) > 0)
		@foreach($errors->all() as $error)
		toastr.error("{{ $error }}");
		@endforeach
		@endif
	</script>
</body>
</html>
