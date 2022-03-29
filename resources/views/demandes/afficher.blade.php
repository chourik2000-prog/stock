
@extends('deskapp.layout')
 
 @section('content')
	<!-- basic table  Start -->
	<div class="col-md-6 col-sm-12">
		<h4 class="font-20 weight-500 mb-10 text-capitalize">
			<div class="weight-600 font-30 text-blue">Demandes</div>
		</h4>
	</div>
		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<a href={{route('demande.rech')}} class="btn btn-primary">
						<i class="icon-copy dw dw-left-arrow1"></i>
						Voir pour une autre année
					</a>
				</div>		
				<div class="pull-right">
                	<a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#exampleModal"> + Ajouter</a>
				</div>
			</div>	
				@if ($message = Session::get('success'))
					<div class="alert alert-success">
						<p>{{ $message }}</p>
					</div>
    			@endif
					<table class="table">
						<thead>
							<tr>
								<th scope="col"> <strong>Demandeur</strong> </th>
								<th scope="col"> <strong>Désignation</strong> </th>
                                <th scope="col"> <strong>Livré</strong> </th>
                                <th scope="col"> <strong>Date</strong> </th>
								<th scope="col"> <strong>Année académique</strong> </th>
								<th scope="col"> <strong>Actions</strong> </th>
							</tr>
						</thead>
						<tbody>
							@foreach ($demandes as $demande)
								<tr>
									<td>{{$demande->agent->nom}}</td>
									<td>{{ $demande->article->libelle}}</td>
									<td>{{ $demande->qlivree}}</td>
									<td>{{ $demande->date}}</td>
									<td>{{ $demande->annee->libelle}}</td>
									<td>
										<form action="{{ route('demandes.destroy',$demande->id) }}" method="POST">    
												<button type="button" class="btn btn-info btn-sm" data-toggle="modal" 
													data-target="#modaledit{{$demande->id}}">
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
								</tr>
								@include('demandes.modalmodifier')
							@endforeach
						</tbody>
    				</table>
					<div class="d-flex justify-content-center">
						{!! $demandes->links() !!}
					</div>
				@include('demandes.modalafficher')   
				@endsection
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
	