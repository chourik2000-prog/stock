
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
						<div class="weight-600 font-30 text-blue">Stock</div>
						</h4>
						</div>
						
						<div class="pull-right">
                <a href="/approvisionnements" class="btn btn-success btn-sm text-white">Approvisionnement</a>
            </div>
		</div>
					
		<table class="table">
			<thead>
				<tr>
				<th scope="col"> <strong> Articles</strong> </th>
				<th scope="col"> <strong> QEntrée</strong> </th>
				<th scope="col"> <strong> QLivrée</strong> </th>
				<th scope="col"> <strong> Perte</strong> </th>
				<th scope="col"> <strong> QRestant</strong> </th>
	
				</tr>
			</thead>
			<tbody>
          @foreach ($stocks as $stock) 
              <tr>
				  @php
					  $entrant = Illuminate\Support\Facades\DB::table('approvisionnements')->where('id_article',$stock->id)->sum('qentrant');
					  $livree = Illuminate\Support\Facades\DB::table('demandes')->where('id_article',$stock->id)->sum('qlivree');
					  $perte = Illuminate\Support\Facades\DB::table('pertes')->where('id_article',$stock->id)->sum('qperdue');
				
					  $existant = $entrant - $livree  - $perte;
				  @endphp
				  
               <td>{{ $stock->libelle}}({{$stock->caracteristique}})</td>
			   <td>{{$entrant}} </td>
			   <td>{{$livree}} </td>
			   <td>{{$perte}} </td>
			   <td>{{$existant}} </td>
			  
        @endforeach 
		</tbody>
    </table>     
@endsection