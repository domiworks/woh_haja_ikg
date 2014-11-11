<!doctype html>
<html>
<head>
	@include('includes.head')
</head>
<body>
	@include('includes.header_admin')
	
	@yield('content')
	
	@include('includes.sidebar_admin')
</body>
</html>