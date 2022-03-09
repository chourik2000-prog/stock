
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
									Janvier 2022
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
						<div class="weight-600 font-30 text-blue">Articles</div>
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
								<th scope="col"> <strong>Caractéristiques</strong> </th>
								<th scope="col"> <strong>Actions</strong> </th>
							</tr>
						</thead>
						<tbody>
                        @foreach ($articles as $article)
        <tr>
            <td>{{ $article->libelle}}</td>
			<td>{{ $article->caracteristique}}</td>
            <td>
                <form action="{{ route('articles.destroy',$article->id) }}" method="POST">    
					<button type="button" class="btn btn-info btn-sm" data-toggle="modal" 
						data-target="#modaledit{{$article->id}}">
						<a  href="#">
							<i class="dw dw-edit-1 text-white"></i>
						</a>
					</button>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-warning btn-sm" onClick='return confirmSubmit()'>
                        <a  href="#">
							<i class="icon-copy dw dw-trash1 text-white"></i>
						</a>
					</button>
                </form>
            </td>
        </tr>
        @include('articles.modalmodifier')
        @endforeach
    </table>

    @include('articles.modalafficher')
      
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