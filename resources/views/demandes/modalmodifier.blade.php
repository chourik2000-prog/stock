<div class="modal fade" id="modaledit{{$demande->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enregistrer une demande</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('demandes.update',$demande->id) }}" method="POST">
                    @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="label">Demandeur</label>
                                            <div class="select">
                                                <select class="form-control" name="id_agent">
                                                @foreach($agents as $agent)
                                                    <option name="nom" value="{{ $agent->id }}">{{ $agent->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Désignation</label>
                                        <div class="select">
                                            <select class="form-control" name="id_article">
                                                @foreach($articles as $article)
                                                    <option name="libelle" value="{{ $article->id }}">{{ $article->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="qlivree">Quantité livrée:</label>
                                        <input type="number" 
                                        name="qlivree" id="qlivree"
                                        value="{{ $demande->qlivree }}" 
                                        class="form-control @error('qlivree') is-invalid @enderror"
                                        placeholder="La quantité sortant" required="required">
                                        @error('qlivree') <p>Ce champs est incorrect</p>@enderror
                                    </div>
                                    <div class="form-group">
                                    <label for="date"> Date:</label>
                                        <input type="date" name="date" id="date" value="{{ $demande->date }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Année académique</label>
                                        <div class="select">
                                            <select class="form-control" name="id_annee">
                                                @foreach($annees as $annee)
                                                    <option name="libelle" value="{{ $annee->id }}">{{ $annee->libelle }}</option>
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