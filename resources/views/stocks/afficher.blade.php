<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Stocks</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
   <style>
      #bar1{
		  height: -1500px; 
		  width: 10000px;
		  right: 200px;
		  top: -100px
		  
	  }
   </style>

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
@extends('layout')
 
 @section('content')
	<div class="mobile-menu-overlay"></div>
	<div class="main-container col-lg-12" id="bar1" >
	
			<div class="min-height-10px" >
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
                                <h4 class="font-20 weight-500 mb-10 text-capitalize">
						<div class="weight-600 font-30 text-blue">IAIgestion</div>
						</h4>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right"  >
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									Janvier 2022
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- basic table  Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
						<div class="weight-600 font-30 text-blue">Stock</div>
						</h4>
						</div>
						
						<div class="pull-right">
                <a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#exampleModal">+ Ajouter</a>
            </div>
		</div>
					
		<table class="table">
			<thead>
				<tr>
				<th scope="col"> <strong> Articles</strong> </th>
				<th scope="col"> <strong> Quantité restante</strong> </th>
				</tr>
			</thead>
			<tbody>
          @foreach ($stocks as $stock) 
              <tr>
				  @php
					  $entrant = Illuminate\Support\Facades\DB::table('approvisionnements')->where('id_article',$stock->id)->sum('quantite');
					  $sortant = Illuminate\Support\Facades\DB::table('demandes')->where('id_article',$stock->id)->sum('qlivree');
					  $reste = $entrant-$sortant;
				  @endphp
               <td>{{ $stock->libelle}}</td>
			   <td>{{$reste}} </td>
             </tr> 
        @endforeach 
    </table>
      
@endsection

	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>