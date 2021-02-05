<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="{{ asset('images/logo/logo.png')}}" rel="icon">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Barangay 120 System</title>

    <link href="{{ asset('docs/css/modern.css') }}" rel="stylesheet"> 

	<style>
	.container-login {
    	width: 100%;
		padding-right: .75rem !important;
		padding-left: 0px !important;
		margin-right: 0px !important;
		margin-left: 0px !important;
		height: 100vh !important;  
	}
	h5 {
	display: inline-block;
	padding: 10px;
	background: #B9121B;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	}

	.full-screen {
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;
	}

	</style>
</head>
<!-- SET YOUR THEME -->

<body class="theme-blue">
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<div class="container-login">
		<div class="row">
			<div class="col-lg-9 col-sm-9 col-md-9">
				<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner ">
					  <div class="carousel-item fade">
						<img class="d-block w-100" src="{{asset('images/carousel/1.jpg')}}" data-color="lightblue" alt="First Image">
					  </div>
					  <div class="carousel-item fade">
						<img class="d-block w-100" src="{{asset('images/carousel/2.jpg')}}" data-color="violet" alt="Third Image">
					  </div>
					  <div class="carousel-item fade">
						<img class="d-block w-100" src="{{asset('images/carousel/3.jpg')}}" data-color="violet" alt="Third Image">
					  </div>
					  <div class="carousel-item fade">
						<img class="d-block w-100" src="{{asset('images/carousel/4.jpg')}}" data-color="violet" alt="Third Image">
					  </div>
					</div>
				  </div>
			</div>
			<div class="col-lg-3 col-sm-3 col-md-3 mt-5">
				<div class="text-center mt-4">
					<p class="lead">
						Sign in to your account to continue
					</p>
				</div>
				<form method="POST" action="{{ route('login') }}">
						@csrf
						<div class="form-group">
							<label>Email</label>
							<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
							<small>
								<a href="#">Forgot password?</a>
							</small>
						</div>
						<div>
							<div class="custom-control custom-checkbox align-items-center">
								<input id="customControlInline" type="checkbox" class="custom-control-input" value="remember-me" name="remember-me" checked>
								<label class="custom-control-label text-small" for="customControlInline">Remember me next time</label>
							</div>
						</div>
						<div class="text-center mt-3">
							<button type="submit" class="btn btn-lg btn-primary">Login</button>
							<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
						</div>
				</form>
		  </div>
		</div>
	  </div>
	<script src="{{ asset('docs/js/app.js') }}"></script>

</body>
	<script>
		var $item = $('.carousel-item'); 
		var $wHeight = $(window).height();
		$item.eq(0).addClass('active');
		$item.height($wHeight); 
		$item.addClass('full-screen');

		$('.carousel img').each(function() {
		var $src = $(this).attr('src');
		var $color = $(this).attr('data-color');
		$(this).parent().css({
			'background-image' : 'url(' + $src + ')',
			'background-color' : $color
		});
		$(this).remove();
		});

		$(window).on('resize', function (){
		$wHeight = $(window).height();
		$item.height($wHeight);
		});

		$('.carousel').carousel({
		interval: 4000,
		pause: "false"
		});
	</script>
</html>