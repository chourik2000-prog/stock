
@extends('deskapp.layout')
 
@section('content')
   <!-- basic table  Start -->
<div class="col-md-6 col-sm-12">
    <div class="weight-600 font-30">Les statistiques de l'année:
        <h3>{{$anneeA}}</h3>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9 pd-20 card-box mb-30">			
        <div class="row clearfix">
            <div class="col-sm-12 col-md-4 mb-30">
                <div class="card card-box">
                    <div class="card-header weight-500">
                        <h5>Commandes totales</h5>
                    </div>
                    <div class="card-body">
                        <h2> {{$totalCmdes}}</h2>
                    </div>  
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-30">
                <div class="card card-box">
                    <div class="card-header">
                       <h5>Approvisionnements totals</h5>
                    </div>
                    <div class="card-body">
                        <h2>{{$totalAppro}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-30">
                <div class="card card-box">
                    <div class="card-header">
                        <h5>Demandes totales</h5>
                    </div>
                    <div class="card-body">
                        <h2>{{$totalDemd}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-30">
                <div class="card card-box">
                    <div class="card-header">
                        <h5>Pertes totales</h5>
                    </div>
                    <div class="card-body">
                        <h2>{{$totalPerte}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-30">
                <div class="card card-box">
                    <div class="card-header">
                        <h5>Commandes non livrées</h5>
                    </div>
                    <div class="card-body">
                        <h2>{{$totalCmdn}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>


                <div class="card text-white bg-danger mb-3" id="cards" style="max-width: 18rem;">
                    <div class="card-header">Commandes</div>
                    <div class="card-body">
                        <h1 class="card-title text-center" id="chiffre">
                            {{$totalCmdes}}
                        </h1>
                        <p class="card-text">Article total.</p>
                    </div>
                </div>
    

@endsection