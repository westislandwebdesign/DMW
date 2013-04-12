<!DOCTYPE html>
<html>
	<head>
		<!-- Site title -->
		<title>Cartify</title>

		<link href="{{ URL::to_asset('bundles/cartify/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ URL::to_asset('bundles/cartify/css/style.css') }}" rel="stylesheet">
		<style type="text/css">body { padding-top: 60px; }</style>
	</head>
	<body>
		<!-- html > body > .navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="{{ URL::to('cartify') }}">Cartify</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li{{ ( URI::segment(2) == '' ? ' class="active"': '' ) }}><a href="{{ URL::to('cartify') }}">Home</a></li>
							<li{{ ( URI::segment(2) == 'cart' ? ' class="active"': '' ) }}><a href="{{ URL::to('cartify/cart') }}">Cart</a></li>
							<li{{ ( URI::segment(2) == 'wishlist' ? ' class="active"': '' ) }}><a href="{{ URL::to('cartify/wishlist') }}">Wishlist</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- html > body > .container -->
		<div class="container">
			@if ($success = Session::get('success'))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Success!</strong> {{ $success }}
				</div>
			@endif
			@if ($error = Session::get('error'))
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Error!</strong> {{ $error }}
				</div>
			@endif
			@if ($warning = Session::get('warning'))
			<div class="alert alert-warning">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Warning!</strong> {{ $warning }}
			</div>
			@endif

			<!-- Content -->
			@yield('content')
		</div>

		<!-- Scripts -->
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="{{ URL::to_asset('bundles/cartify/js/bootstrap.js') }}"></script>
		@yield('scripts')
	</body>
</html>
