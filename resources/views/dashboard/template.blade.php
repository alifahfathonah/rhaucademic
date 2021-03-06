<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>{{env('APP_NAME')}} - @yield('pagetitle')</title>
	
	<link rel="stylesheet" href="{{asset('assets/semantic/semantic.min.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/css/slick.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}" />
	<link
	rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
	integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ="
	crossorigin="anonymous"
	/>
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
</head>

<body>
	<!-- sidebar -->
	@include('dashboard.components.sidebar')
	<!-- sidebar -->
	<!-- top nav -->
	@include('dashboard.components.topnav')
	<!-- top nav -->
	
	<div class="pusher">
		<div class="main-content">
			{{-- @include('dashboard.components.breadcrumbs') --}}
			{{ Breadcrumbs::render() }}
			@yield('content')
		</div>
	</div>
	
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/semantic/semantic.min.js')}}"></script>
	<script src="{{asset('assets/js/slick.js')}}"></script>
	<script src="{{asset('assets/js/script.js')}}"></script>
	<script>
		$('.message .close').on('click', function() {
			$(this).closest('.message').transition('fade');
		});
		// checkbox toggle
		$('.ui.checkbox').checkbox();
		// accordion
		$('.ui.accordion').accordion();
	</script>
	@yield('pagescript')
</body>
</html>
