<!DOCTYPE html>
<html>
<head>
	<title>@yield('judul')</title>
	{{-- <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/bootstrap.css"> --}}
	<link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/js/jquery-ui/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/sb-admin-2.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link href="sb-admin/img/Logo.png" rel="shortcut icon">
	<script type="text/javascript" src="{{ base_url() }}assets/js/jquery.js"></script>
	<script type="text/javascript" src="{{ base_url() }}assets/js/jquery.js"></script>
	<script type="text/javascript" src="{{ base_url() }}assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="{{ base_url() }}assets/js/jquery-ui/jquery-ui.js"></script>	
	<style>
		.navbar-default {
			background-color: #224abe;
		}
		.navbar-default .navbar-brand {
			color: white;
		}
		.navbar-default .navbar-collapse{
			color: white
		}
		.navbar-default .navbar-brand:hover,
		.navbar-default .navbar-brand:focus {
			color: white;
		}
		#wrapper {
			overflow-x: hidden;
		}

		#sidebar-wrapper {
		min-height: 100vh;
		margin-left: -15rem;
		-webkit-transition: margin .25s ease-out;
		-moz-transition: margin .25s ease-out;
		-o-transition: margin .25s ease-out;
		transition: margin .25s ease-out;
		}

		#sidebar-wrapper .sidebar-heading {
		padding: 0.875rem 1.25rem;
		font-size: 1rem;
		}

		#sidebar-wrapper .list-group {
		width: 15rem;
		}

		#page-content-wrapper {
		min-width: 100vw;
		}

		#wrapper.toggled #sidebar-wrapper {
		margin-left: 0;
		}

		@media (min-width: 768px) {
		#sidebar-wrapper {
			margin-left: 0;
		}

		#page-content-wrapper {
			min-width: 0;
			width: 100%;
		}

		#wrapper.toggled #sidebar-wrapper {
			margin-left: -15rem;
		}
		}

	</style>
</head>
<body>
	
	<div id="wrapper">
		<div id="sidebar-wrapper">
		
		</div>
		@include('template/sidebar-pimpinan')
	<div id="content-wrapper" class="d-flex flex-column">
		<!-- Main Content -->
		<div id="content">
			<nav class="navbar navbar-light" style="background-color: #fff" >
				<div class="container-fluid">
					<button class="btn btn-primary" style="background-color:darkorange" id="menu-toggle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
					  </svg></button>
					<div class="navbar-header">
						<a class="navbar-brand" style="color: white"><img src="../@yield('header')"style = "width:150px; display:block; margin:40%"></a>
					</div>
					<form class="d-flex">
					    <button class="btn btn-success me-2" type="submit"><a role="button" href="{{ base_url() }}pimpinan/profile" style="color: white;text-decoration: none;">Hy, <?=$_SESSION['username']?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
						<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
						<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
					  </svg></i></a></button>
					  
					</form>
				  </div>
				</nav>
				<div class="container">
					<div class="row align-items-start">
					  <div class="col md-4">
						@yield('content')
					  </div>
					</div>
				</div>			
		</div>
		</div>


	
	
	
	{{-- <div class="col-md-10"> --}}
<!-- CONTENT -->
	{{-- @yield('content') --}}
<!-- EOF CONTENT -->
<script>
	$("#menu-toggle").click(function(e) {
	  e.preventDefault();
	  $("#wrapper").toggleClass("toggled");
	});
  </script>
</div>
	</body>
</html>
