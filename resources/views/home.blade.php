
@extends('deskapp.layout')
 
@section('content')
   <!-- basic table  Start -->
<div class="col-md-10 col-sm-12">
    <div class="weight-600 font-30">
        Les statistiques de l'année:{{$anneeA}}
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class=" pd-20 card-box mb-30">			
        <div class="row clearfix">
            <div class="col-sm-12 col-md-4 mb-30">
                <div class="card card-box">
                    <div class="card-header weight-500">
                        <h5>Commandes totales</h5>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center"> {{$totalCmdes}}</h2>
                    </div>  
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-30">
                <div class="card card-box">
                    <div class="card-header">
                       <h5>Approvisionnement total</h5>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{$totalAppro}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-30">
                <div class="card card-box">
                    <div class="card-header">
                        <h5>Demandes totales</h5>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{$totalDemd}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-30">
                <div class="card card-box">
                    <div class="card-header">
                        <h5>Pertes totales</h5>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{$totalPerte}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-30">
                <div class="card card-box">
                    <div class="card-header">
                        <h5>Commandes non livrées</h5>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{$totalCmdn}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-30">
                <div class="card card-box">
                    <div class="card-header">
                        <h5>Article en stock</h5>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{$totalCmdn}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection