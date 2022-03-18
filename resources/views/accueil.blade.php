@extends('deskapp.layout')
@section('content')
			<div class="card-box mb-30">
				<h2 class="h4 pd-20">Liste des fournitures en stock</h2>
					<table class="table nowrap">
						<thead>
							<tr>
								<th>Articles</th>
								<th>Entrée</th>
								<th>Livré</th>
								<th>Perte</th>
								<th>Stock</th>
								<th>Alerte</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($accueils as $accueil)
							<tr>
								@php
									$qlivree = Illuminate\Support\Facades\DB::table('demandes')->where('id_article',$accueil->id)->sum('qlivree');
									$qentrant = Illuminate\Support\Facades\DB::table('approvisionnements')->where('id_article',$accueil->id)->sum('qentrant');
									$perte = Illuminate\Support\Facades\DB::table('pertes')->where('id_article',$accueil->id)->sum('qperdue');
									$reste = $qentrant  -$qlivree-$perte;
								@endphp
							
									<td>{{ $accueil->libelle}}({{$accueil->caracteristique}})</td>
									<td>{{ $qentrant}}</td> 
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
 @endsection 