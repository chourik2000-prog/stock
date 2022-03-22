<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enregistrer une demande </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())

                    @endif  
                        <form action="{{ route('demandes.store') }}" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                                <label class="label">Demandeur</label>
                                                    <div class="select">
                                                        <select class="form-control" name="id_agent">
                                                            @foreach($agents as $agent)
                                                                <option value="{{ $agent->id }}">{{ $agent->nom }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="label">Désignation</label>
                                                <div class="select">
                                                        <select class="form-control" name="id_article">
                                                            @foreach($articles as $article)
                                                                <option value="{{ $article->id }}">{{ $article->libelle }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="qlivree">Quantité livrée:</label>
                                            <input type="number" 
                                            name="qlivree" id="qlivree"
                                            class="form-control @error('qlivree') is-invalid @enderror" 
                                            placeholder="La quantité sortant" required="required">
                                            @error('qlivree') <p>Ce champs est incorrect</p>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Date:</label>
                                            <input type="date" name="date" id="date" 
                                            class="form-control @error('date') is-invalid @enderror"
                                            placeholder="La date du jour" required="required">
                                            @error('date') <p>Ce champs est incorrect</p>@enderror
                                            @include('flash::message')
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Année académique</label>
                                            <div class="select">
                                                <select class="form-control" name="id_annee">
                                                    @foreach($annees as $annee)
                                                        <option value="{{ $annee->id }}">{{ $annee->libelle }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            <div class="row"> 
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button> 
            </div>
        </div>
    </div>
</div>