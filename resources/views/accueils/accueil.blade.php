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
		
			<div class="pull-right">
				<a href={{route('accueil.rech')}} class="btn btn-success">
					<i class="icon-copy dw dw-file-3"></i>
					Sortir le PDF
				</a>
			</div>
		</div>
		<table class="table nowrap" id="myTable">
			<thead>
				<tr>
					<th>Articles</th>
					<th>SI</th>
					<th>Entrée</th>
					<th>S.total</th>
					<th>Livré</th>
					<th>Perte</th>
					<th>S.final</th>
					<th>Alerte</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($articles as $article)
					<tr>
						<td>{{ $article->libelle}}({{$article->caracteristique}})</td>
						<td>{{ $si}}</td> 
						<td>{{ $entree}}</td>
						<td>{{$stocktotal}}</td>
						<td>{{$livree}}</td>
						<td>{{ $perdue}}</td> 
						<td>{{$stockfinal}} </td>

						@if ($stockfinal == 0)
						<td><span class="btn btn-lg btn-danger" id="rond"></span></td> @endif

						@if ($stockfinal < 10 & $stockfinal >0)
						<td><span class="btn btn-lg btn-warning" id="rond"></span></td> @endif

						@if ($stockfinal>=10)
						<td><span class="btn btn-lg btn-success" id="rond"></span></td>
						@endif
					</tr> 
				@endforeach 
			</tbody>
		</table>
	</div>
 @endsection 