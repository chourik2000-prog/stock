
@extends('deskapp.layout')

@section('content')
    <div class="row justify-content-center align-content-center mt-4">
        <div class="col-lg-7 col-sm-10 col-md-7">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="font-20 weight-500 mb-10">
                            Choisir l'article pour voir la quantité
                        </h4>
                    </div>
                </div>
                <div>
                    <form action='/bilans/recherche' method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-7 col-sm-10 col-md-7">
                                <div class="form-group">
                                        <label class="label">Désignation</label>
                                        <div class="select">
                                            <select class="form-control" name="id_article">
                                                @foreach($bilans as $bilan)
                                                    <option value="{{ $bilan->id }}">{{ $bilan->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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