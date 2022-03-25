<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un approvisionnement </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any()) 
            
                @endif  
                <form action="{{ route('approvisionnements.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="label">Désignation</label>
                                    <div class="select">
                                        <select 
                                        class="form-control @error('id_article') is-invalid @enderror" 
                                        name="id_article" required="required">
                                            @foreach($articles as $article)
                                                <option value="{{ $article->id }}">{{ $article->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_article') <p>Ce champs est incorrect</p>@enderror
                            </div>
                            <div class="form-group">
                                <label class="label">Fournisseur</label>
                                    <div class="select">
                                        <select 
                                            class="form-control @error('id_fournisseur') is-invalid @enderror" 
                                            name="id_fournisseur" required="required">
                                            @foreach($fournisseurs as $fournisseur)
                                                <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_fournisseur') <p>Ce champs est incorrect</p>@enderror
                            </div>
                            <div class="form-group">
                                   <label for="qentrant"> Quantité:</label>
                                    <input
                                    id="qentrant"
                                    type="number" 
                                    name="qentrant" 
                                    class="form-control @error('qentrant') is-invalid @enderror" 
                                    placeholder="La quantité de l'article" required="required">
                                    @error('qentrant') <p>Ce champs est incorrect</p>@enderror
                            </div>
                            <div class="form-group">
                                  <label for="date">  Date:</label>
                                    <input type="date" name="date" 
                                    class="form-control" id="date" 
                                    placeholder="La date de l'achat" required="required">
                                    @include('flash::message')
                            </div>
                            <div class="form-group">
                                <label class="label">Année académique</label>
                                    <div class="select">
                                        <select 
                                            class="form-control @error('id_annee') is-invalid @enderror"  
                                            name="id_annee" required="required">
                                            @foreach($annees as $annee)
                                                <option value="{{ $annee->id }}">{{ $annee->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_annee') <p>Ce champs est incorrect</p>@enderror
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
   