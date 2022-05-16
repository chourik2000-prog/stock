
@extends('deskapp.lay')

@section('content')
    <div class="row justify-content-center align-content-center mt-4">
        <div class="col-lg-7 col-sm-10 col-md-7">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="font-20 weight-500 mb-10">
                            Enregistrer une année
                        </h4>
                    </div>
                </div>
                <div>
                    <form action='msg' method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-lg-7 col-sm-10 col-md-7">
                                    <div class="form-group">
                                        <p>Veuillez saisir une année en cliquant sur le bouton ci-dessous </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <a href="/annees" class="btn btn-success btn-sm text-white">
                                        Enregistrer une année
                                    </a>
                                </div> 
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection