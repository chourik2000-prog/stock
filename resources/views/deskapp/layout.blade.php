
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>iaigestion</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href={{asset('vendors/images/apple-touch-icon.png')}}>
	<link rel="icon" type="image/png" sizes="32x32" href={{asset('vendors/images/favicon-32x32.png')}}>
	<link rel="icon" type="image/png" sizes="16x16" href={{asset('vendors/images/favicon-16x16.png')}}>
	<link rel="stylesheet" type="text/css" href={{asset("vendors/DataTables/dataTables.bootstrap4.min.css")}}>
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href={{asset('vendors/styles/core.css')}}>
	<link rel="stylesheet" type="text/css" href={{asset('vendors/styles/icon-font.min.css')}}>
	<link rel="stylesheet" type="text/css" href={{asset('vendors/styles/style.css')}}>
	
	@stack('stylesheets')
    
	<style>
		#cards{
			margin-bottom: 2%;
			margin-top: 3%;
			margin-right: 5%;
			margin-left: 5%;
			width: 23%
		}
        #bar1{
            height: -1500px; 
            width: 300%;
            right: 230px;
            top: -80px
        }
     </style>
</head>
<body class="header-dark sidebar-dark">
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{asset('vendors/images/logo-icon.png')}}" alt=""><h3> IAI-TOGO gestion de stock</h3></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>100%</div>
			<div class="loading-text">
				Chargement...
			</div>
		</div>
	</div>

    <!-- header -->
	@include('deskapp.header')


     <!-- sidebar -->
@include('deskapp.sidebar')
<div class="mobile-menu-overlay"></div>
<div class="main-container col-11 ml-5 mt-2">
	<div class="mobile-menu-overlay"></div>
		@yield('content')
	</div>

	<!-- js -->
	<script src={{asset('vendors/scripts/core.js')}}></script>
	<script src={{asset('vendors/scripts/script.min.js')}}></script>
	<script src={{asset('vendors/scripts/process.js')}}></script>
	<script src={{asset('vendors/scripts/layout-settings.js')}}></script>
	<script src={{asset('src/plugins/apexcharts/apexcharts.min.js')}}></script>
	@stack('javascripts')
</body>
</html>