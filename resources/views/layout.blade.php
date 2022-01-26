<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>IAIgestion</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{('vendors/images/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{('vendors/images/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{('vendors/images/favicon-16x16.png')}}">

	<link rel="apple-touch-icon" sizes="180x180" href="{{url('vendors/images/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{('vendors/images/logo-icon.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{('vendors/images/logo-icon.png')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{('vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{('vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{('src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{('src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{('vendors/styles/style.css')}}">
	
	<link href="{{('vendors/styles/bootstrap.css')}}" rel="stylesheet">
        <link href="{{('vendors/styles/bootstrap.min.css')}}" rel="stylesheet">
        <script src="{{('vendors/scripts/jquery.min.js')}}"></script>
        <script src="{{('vendors/scripts/bootstrap.min.js')}}"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{('vendors/images/logo-icon.png')}}" alt=""><h3> IAIgestion</h3></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
		<div class='percent' id='percent1'>100%</div>
			<div class="loading-text">
				en cours de chargement
			</div>
		</div>  
	</div>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Faire une recherche">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Fournitures</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Pour</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Demandeur</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Recherche</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
									<a href="#">
										<img src="{{('vendors/images/logo-icon.png')}}" alt="">
										<h3>IAIgestion</h3>
										<p>Aucune notification à signaler</p>
									</a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="{{('vendors/images/logo-icon.png')}}" alt="">
						</span>
						<span class="user-name">IAIgestion</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="/profil"><i class="dw dw-user1"></i> Profil</a>
						<a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Déconnexion</a>
					</div>
				</div>
			</div>
		
		</div>
	</div>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
			Paramètres de mise en page
				<span class="btn-block font-weight-400 font-12">Paramètres de l'interface utilisateur</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Fond de l'en-tête</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">Blanc</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Sombre</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Fond de la barre latérale</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">Blanc</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Sombre</a>
				</div>
		</div>
	</div>
  </div>
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="/accueil">
				<img src="{{('vendors/images/logo-icon.png')}}"  alt="" class="dark-logo"><span></span>
				<img src="{{('vendors/images/logo-icon.png')}}" alt="" class="light-logo"><span>IAIgestion</span>
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="/" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Accueil</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="/categories" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-library"></span><span class="mtext">Catégories</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-edit2"></span><span class="mtext">Articles</span>
						</a>
						<ul class="submenu">
							<li><a href="/approvisionnements">Approvisionnements</a></li>
							<li><a href="/ajustements">Ajustements</a></li>
							<li><a href="/articles">Articles</a></li>
						</ul>
					</li>
					<li>
						<a href="/demandes" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-calendar1"></span><span class="mtext">Demandes</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-apartment"></span><span class="mtext">Notifications</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-browser2"></span><span class="mtext">Page d'erreur</span>
						</a>
						<ul class="submenu">
							<li><a href="400.html">400</a></li>
							<li><a href="403.html">403</a></li>
							<li><a href="404.html">404</a></li>
							<li><a href="500.html">500</a></li>
							<li><a href="503.html">503</a></li>
						</ul>
					</li>

				
					<li>
						<a href="javascript:;" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-edit-2"></span><span class="mtext">Documentation</span>
						</a>
						<ul class="submenu">
							<li><a href="introduction.html">Introduction</a></li>
							<li><a href="getting-started.html">Démarrage</a></li>
							<li><a href="color-settings.html">Réglages de couleur</a></li>
							<li><a href="third-party-plugins.html">Plugins tiers</a></li>
						</ul>
					</li>
					<li>
						<a href="https://www.iai-togo.tg/" target="_blank" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-paper-plane1"></span>
							<span class="mtext">Site de l'institut <img src="{{('vendors/images/coming-soon.png')}}" alt="" width="25"></span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
	@yield('content')
	</div>
	<!-- js -->
	<script src="{{('vendors/scripts/core.js')}}"></script>
	<script src="{{('vendors/scripts/script.min.js')}}"></script>
	<script src="{{('vendors/scripts/process.js')}}"></script>
	<script src="{{('vendors/scripts/layout-settings.js')}}"></script>
	<script src="{{('src/plugins/apexcharts/apexcharts.min.js')}}"></script>
	<script src="{{('src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{('src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{('src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{('src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{('vendors/scripts/dashboard.js')}}"></script>
</body>
</html>