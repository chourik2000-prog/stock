@extends('layout')
@section('content')
<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="{{('vendors/images/banner-img.png')}}" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Bienvenue!<div class="weight-600 font-30 text-blue">IAI-TOGO(2022)</div>
						</h4>
						<p class="font-18 max-width-600">Cette plateforme est pour la gestion des fournitures de l'IAI-TOGO.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">502</div>
								<div class="weight-600 font-14">Achat</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">100</div>
								<div class="weight-600 font-14">Demandes</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">402</div>
								<div class="weight-600 font-14">En stock</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">11</div>
								<div class="weight-600 font-14">Agent</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
			<div class="card-box mb-30">
				<h2 class="h4 pd-20">Listes de fournitures en stock</h2>
				<table class=" table nowrap">
					<thead>
						<tr>
							<th>Articles</th>
							<th>Fournisseurs</th>
							<th>QExistant</th>
							<th>QLivrée</th>
							<th>Stock final</th>
							<th>Alerte</th>
						</tr>
					</thead>
					<tbody>
						@foreach($accueils as $accueil)
						<tr>
							@php
								$entrant = Illuminate\Support\Facades\DB::table('approvisionnements')->where('id_article',$accueil->id)->sum('quantite');
								$sortant = Illuminate\Support\Facades\DB::table('demandes')->where('id_article',$accueil->id)->sum('qlivree');
								$reste = $entrant-$sortant;
						  
							@endphp
							
						 <td>{{ $accueil->libelle}}({{$accueil->caracteristique}})</td>
						 <td>{{ $accueil->fournisseur}}</td>
						 <td>{{ $accueil->quantite}}</td>
						 <td>{{ $accueil->qlivree}}</td>
						 <td>{{$reste}} </td>
						 @if ($reste<10)
						 <td><span class="btn btn-lg btn-danger" id="rond"></span> </td>
						 @else
						 <td><span class="btn btn-lg btn-success" id="rond"></span> </td>
						 @endif
						 
					   </tr> 
				  @endforeach 
					</tbody>
				</table>
			</div>
		</div>
        @endsection 