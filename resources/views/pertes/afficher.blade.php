
@extends('deskapp.lay')
 @section('content')
<!-- basic table  Start -->
<div class="col-md-6 col-sm-12">
	<h4 class="font-20 weight-500 mb-10 text-capitalize">
		<div class="weight-600 font-30 text-blue">Pertes</div>
	</h4>
</div>
<div class="pd-20 card-box mb-30">
	<div class="clearfix mb-20">
		<div class="pull-left">
			<a href={{route('perte.rech')}} class="btn btn-primary">
				<i class="icon-copy dw dw-left-arrow1"></i>
				Voir pour une autre année
			</a>
		</div>
		@if($user != "admin")
			<div class="pull-right">
				<a class="btn btn-success btn-sm text-white" id="disabled" data-toggle="modal" data-target="#exampleModal"> + Ajouter</a>
			</div>
		@else
			<div class="pull-right">
				<a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#exampleModal"> + Ajouter</a>
			</div>
		@endif
	</div>
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			<table class="table" id="datatable">
				<thead>
					<tr>
						<th scope="col"> <strong>Désignation</strong> </th>
						<th scope="col"> <strong>Perte</strong> </th>
						<th scope="col"> <strong>Date</strong> </th>
						<th scope="col"> <strong>Année académique</strong> </th>
						<th scope="col"> <strong> Actions</strong> </th>
					</tr>
				</thead>
				<tbody>
					@foreach ($pertes as $perte)
						<tr>
							<td>{{ $perte->article->libelle}}</td>
							<td>{{ $perte->qperdue}}</td>
							<td>{{ $perte->date}}</td>
							<td>
								{{ $perte->annee->dateDebut}} au
								{{ $perte->annee->dateFin}}
							</td>
							@if($user != "admin")
								<td>
									<form action="{{ route('pertes.destroy',$perte->id) }}" method="POST">    
										<button type="button" id="disabled" class="btn btn-info btn-sm" data-toggle="modal" 
											data-target="#modaledit{{$perte->id}}">
											<a  href="#">
												<i class="dw dw-edit-1 text-white"></i>
											</a>
										</button>
										@csrf
										@method('DELETE')
										<button type="submit" id="disabled" class="btn btn-warning btn-sm" onClick='return confirmSubmit()'>
											<a href="#">
												<i class="dw dw-trash1 text-white"></i>
											</a>
										</button>
									</form>
								</td>
							@else
								<td>
									<form action="{{ route('pertes.destroy',$perte->id) }}" method="POST">    
										<button type="button" class="btn btn-info btn-sm" data-toggle="modal" 
											data-target="#modaledit{{$perte->id}}">
											<a  href="#">
												<i class="dw dw-edit-1 text-white"></i>
											</a>
										</button>
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-warning btn-sm" onClick='return confirmSubmit()'>
											<a href="#">
												<i class="dw dw-trash1 text-white"></i>
											</a>
										</button>
									</form>
								</td>
							@endif
						</tr>
						@include('pertes.modalmodifier')
					@endforeach
				</tbody>
			</table>
@include('pertes.modalafficher')   
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

<script>
	function confirmSubmit()
	{
		var agree=confirm("Êtes-vous sûr de vouloir supprimer?");
		if (agree)
		return true ;
		else
		return false ;
	}
</script>