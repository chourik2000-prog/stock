
@extends('deskapp.layout')
 
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
									Avril 2022
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
						<div class="weight-600 font-30 text-blue">Pertes</div>
						</h4>
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
                                <th scope="col"> <strong>Désignation</strong> </th>
                                <th scope="col"> <strong>Perte</strong> </th>
                                <th scope="col"> <strong>Date</strong> </th>
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
                <form action="{{ route('pertes.destroy',$perte->id) }}" method="POST">    
                    <button type="button" class="btn btn-info" data-toggle="modal" 
					data-target="#modaledit{{$perte->id}}"><a  href="#"><span class="
					glyphicon glyphicon-pencil text-white"></span></a></button>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-warning" onClick='return confirmSubmit()'>
						<a  href="#"><span class="glyphicon glyphicon-trash text-white"></span></a></button>
                </form>
            </td>
        </tr>
        @include('pertes.modalmodifier')
        @endforeach
    </table>

    @include('pertes.modalafficher')
      
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