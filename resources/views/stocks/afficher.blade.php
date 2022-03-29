
@extends('deskapp.layout')
 
 @section('content')
	<!-- basic table  Start -->
	<div class="col-md-6 col-sm-12">
		<h4 class="font-20 weight-500 mb-10 text-capitalize">
			<div class="weight-600 font-30 text-blue">Stocks</div>
		</h4>
	</div>
	<div class="pd-20 card-box mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<a href="{{route('stock.rech')}}" class="btn btn-primary">
					<i class="icon-copy dw dw-left-arrow1"></i>
					Voir pour une autre année
				</a>
			</div>
			<div class="pull-right">
				<a href="{{route('stock.rech')}}" class="btn btn-success btn-sm text-white">Approvisionnement</a>
			</div>
		</div>			
			<table class="table">
				<thead>
					<tr>
						<th scope="col"> <strong> Articles</strong> </th>
						<th scope="col"> <strong> BonCom</strong> </th>
						<th scope="col"> <strong> Entrant</strong> </th>
						<th scope="col"> <strong> Différence</strong> </th>
						<th scope="col"> <strong> Contrôle</strong> </th>
					</tr>
				</thead>
				<tbody>
					@foreach ($stocks as $stock) 
						<tr>
							@php
								$commande = Illuminate\Support\Facades\DB::table('commandes')->where('id_article',$stock->id)->sum('quantite');
								$entrant = Illuminate\Support\Facades\DB::table('approvisionnements')->where('id_article',$stock->id)->sum('qentrant');
								$livree = Illuminate\Support\Facades\DB::table('demandes')->where('id_article',$stock->id)->sum('qlivree');
								$perte = Illuminate\Support\Facades\DB::table('pertes')->where('id_article',$stock->id)->sum('qperdue');
								$controle = $commande - $entrant;
							@endphp
						
								<td>{{ $stock->libelle}}({{$stock->caracteristique}})</td>
								<td>{{$commande}} </td>
								<td>{{$entrant}} </td>
								<td>{{$controle}} </td>
								@if ($controle == 0)
								<td><span class="btn btn-lg btn-succes" id="rond"></span> </td> @endif
								@if ($controle != 0)
								<td><span class="btn btn-lg btn-danger" id="rond"></span> </td> @endif		   		
						</tr>	  
					@endforeach 
				</tbody>
    		</table>     
@endsection