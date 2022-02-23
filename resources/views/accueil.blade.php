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
							Bienvenue!<div class="weight-600 font-30 text-blue">IAI-TOGO</div>
						</h4>
						<p class="font-18 max-width-600">Gestion des fournitures de l'IAI-TOGO.</p>
					</div>
				</div>
			</div>
		
			<div class="card-box mb-30">
				<h2 class="h4 pd-20">Listes de fournitures en stock</h2>
				<table class=" table nowrap">
					<thead>
						<tr>
							<th>Articles</th>
							<th>Stock</th>
							<th>Livrée</th>
							<th>Perte</th>
							<th>Stock final</th>
							<th>Alerte</th>
						</tr>
					</thead>
			<tbody>
			@foreach ($accueils as $accueil)
				<tr>
					@php
					    $existant = Illuminate\Support\Facades\DB::table('approvisionnements')->where('id_article',$accueil->id)->sum('qexistant');
						$qlivree = Illuminate\Support\Facades\DB::table('demandes')->where('id_article',$accueil->id)->sum('qlivree');
						$entrant = Illuminate\Support\Facades\DB::table('approvisionnements')->where('id_article',$accueil->id)->sum('qentrant');
						$perte = Illuminate\Support\Facades\DB::table('pertes')->where('id_article',$accueil->id)->sum('qperdue');
						$reste = $entrant-$qlivree-$perte;
						$stock = $entrant + $existant
					@endphp
							
						<td>{{ $accueil->libelle}}({{$accueil->caracteristique}})</td>
						<td>{{ $stock}}</td> 
					@if ($qlivree == null) <td>0</td> @else <td>{{$qlivree}}</td>  @endif 
					<td>{{ $perte}}</td> 
						<td>{{$reste}} </td>
						@if ($reste == 0)
						<td><span class="btn btn-lg btn-danger" id="rond"></span> </td> @endif
						 @if ($reste < 10 & $reste >0)
						<td><span class="btn btn-lg btn-warning" id="rond"></span> </td> @endif		   
					   @if ($reste>=10)
						<td><span class="btn btn-lg btn-success" id="rond"></span> </td>
						@endif

				</tr> 
			 @endforeach 
		</tbody>
	  </table>
	</div>
	</div>
 @endsection 