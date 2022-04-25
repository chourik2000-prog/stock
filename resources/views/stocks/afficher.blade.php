
@extends('deskapp.lay')
 
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
				<a href="{{route('approv.rech')}}" class="btn btn-success btn-sm text-white">Approvisionnement</a>
			</div>
		</div>			
			<table class="table" id="datatable">
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
					@foreach ($articlestocks as $articlestock)
					<tr>
						<td>{{ $articlestock["article"] }}</td>
						<td>{{ $articlestock["cmd"] }}</td> 
						<td>{{ $articlestock["entree"] }}</td>
						<td>{{ $articlestock["diff"] }}</td>
						@if ($articlestock["diff"] == 0)
						<td><span class="btn btn-lg btn-success" id="rond"></span> </td> @endif
						@if ($articlestock["diff"] != 0)
						<td><span class="btn btn-lg btn-danger" id="rond"></span> </td> @endif		   		
					</tr>	  
					@endforeach 
				</tbody>
    		</table>     
@endsection
@push('stylesheet')
	<link rel="stylesheet" href={{asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}>
	<link rel="stylesheet" href={{asset('src/plugins/datatables/css/responsive.bootstrap4.min.css')}}>
@endpush


@push('javascripts')
	<script src={{asset("vendors/DataTables/jquery.dataTables.min.js")}}></script>
	<script src={{asset("vendors/DataTables/dataTables.bootstrap4.min.js")}}></script>
	<script src={{asset("src/scripts/datatable.js")}}></script>
@endpush