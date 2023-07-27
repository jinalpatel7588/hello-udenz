<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<link rel="icon" href="{{ asset('new_assets/images/small-black-logo.png') }}" type="image/x-icon" />
		<title>Udenz Hello</title>
		<meta name="Keywords" content=""/>
		@include('includes.admin.head')
	</head>

	<body>
		@yield('content')
        @yield('footer-link')
        @include('includes.admin.footer_scripts')
	</body>
</html>
