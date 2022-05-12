
@extends('deskapp.layout')

@section('content')
    <div class="row justify-content-center align-content-center mt-4">
        <div class="col-lg-7 col-sm-10 col-md-7">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="font-20 weight-500 mb-10">
                            Choisir l'année et l'agent pour voir l'ensemble des demandes
                        </h4>
                    </div>
                </div>
                <div>
                    <form action='/conso_agents/recherche' method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-7 col-sm-10 col-md-7">
                                <div class="form-group">
                                        <label class="label" for="appro">Année</label>
                                        <div class="select">
                                            <select id="appro" class="form-control" name="id_annee">
                                                @foreach($annees as $annee)
                                                    @php
                                                        $dateDebut = $annee->dateDebut;
                                                        $dateFin = $annee->dateFin;
                                                        $monthd =  \Carbon\Carbon::createFromFormat('Y-m-d',$dateDebut)->locale('fr_FR')
                                                        ->isoformat('MMMM');
                                                        $yeard =  \Carbon\Carbon::createFromFormat('Y-m-d',$dateDebut)->year;

                                                        $monthf =  \Carbon\Carbon::createFromFormat('Y-m-d',$dateFin)->locale('fr_FR')
                                                        ->isoformat('MMMM');
                                                        $yearf =  \Carbon\Carbon::createFromFormat('Y-m-d',$dateFin)->year;
                                                    @endphp
                                                    <option value="{{ $annee->id }}">
                                                        {{ucwords($monthd)}} {{$yeard}} - {{ucwords($monthf)}} {{$yearf}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="label" for="deman">Demandeur</label>
                                    <div class="select">
                                        <select id="deman"
                                            class="form-control @error('id_agent') is-invalid @enderror" 
                                            name="id_agent" required="required">
                                            @foreach($agents as $agent)
                                                <option value="{{ $agent->id }}">{{ $agent->nom }} {{ $agent->prenom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_agent') <p>Ce champs est incorrect</p>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-copy dw dw-analytics-6"></i>
                                      Voir les statistiques
                                </button>
                            </div> 
                        </div>
                    </form>
                </div>
            
            </div>
        </div>
        </div>
    </div>
@endsection