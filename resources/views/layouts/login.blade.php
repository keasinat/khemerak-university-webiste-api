<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Khemarak University | Log in</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ mix('plugins/fontawesome-free/css/all.min.css') }}">
		<!-- icheck bootstrap -->
		<link rel="stylesheet" href="{{ mix('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ mix('css/adminlte.css') }}">
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
		{{-- <div class="login-logo">
			<a href="/">
			<img src="{{ asset('images/logo-main.jpg') }}" alt="" width="360">
			</a>
		</div> --}}
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in to start your session</p>
			@yield('content')

			</div>
			<!-- /.login-card-body -->
		</div>
		</div>
		<!-- /.login-box -->

		@stack('before-scripts')
		<script src="{{ mix('plugins/jquery/jquery.min.js') }}"></script>
		{{-- <script src="{{ mix('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
		<script src="{{ mix('js/adminlte.min.js') }}"></script>
		@stack('after-scripts')
	</body>
</html>
