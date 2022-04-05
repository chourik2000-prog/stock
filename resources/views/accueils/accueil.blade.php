@extends('deskapp.layout')
@section('content')
		<h2 class="h4 ">Liste des fournitures en stock</h2>
			<div class="card-box mb-30 pd-20">
				<div class="clearfix mb-20">
					<div class="pull-left">
						<a href={{route('accueil.rech')}} class="btn btn-primary">
							<i class="icon-copy dw dw-left-arrow1"></i>
							Voir pour une autre année
						</a>
					</div>	
				</div>
					<table class="table nowrap" id="myTable">
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
									<td>{{ $accueil->libelle}}({{$accueil->caracteristique}})</td>
									<td>{{ $totalAppro}}</td> 
									@if ($totalDemd == null) <td>0</td> @else <td>{{$totalDemd}}</td> @endif 
									<td>{{ $totalPerte}}</td> 
									<td>{{$stock}} </td>

									@if ($stock == 0)
									<td><span class="btn btn-lg btn-danger" id="rond"></span></td> @endif

									@if ($stock < 10 & $stock >0)
									<td><span class="btn btn-lg btn-warning" id="rond"></span></td> @endif

									@if ($stock>=10)
									<td><span class="btn btn-lg btn-success" id="rond"></span></td>
									@endif
								</tr> 
			 				@endforeach 
						</tbody>
	  				</table>
				</div>
 @endsection 