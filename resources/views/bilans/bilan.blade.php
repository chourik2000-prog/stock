
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
					<a href={{route('rechercheform')}} class="btn btn-primary">
						<i class="icon-copy dw dw-left-arrow1"></i>
						Voir pour un autre article
					</a>
                    <div class="container px-4 mx-auto mt-4">
                       @if($qEntrant == 0)
							<p class="text-center">Vous n'avez pas de quantité pour l'article en question</p>
						@else
							{!! $chart->container() !!}
					   @endif  
					</div>
                </div> 
        </div>  
	</div>

	<script src="{{ $chart->cdn() }}"></script>
	
	{{ $chart->script() }}
		

@endsection