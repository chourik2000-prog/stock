<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enregistrer le bon de commande </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
            
                @endif  
                <form action="{{ route('commandes.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="label" for="design">Désignation</label>
                                    <div class="select">
                                        <select id="design"
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
                                <label for="quant">quantité:</label>
                                <input type="number" id="quant" name="quantite" 
                                class="form-control @error('quantite') is-invalid @enderror"
                                placeholder="La quantité " required="required">
                                @error('quantite') <p>Ce champs est incorrect</p>@enderror
                            </div>
                            <div class="form-group">
                                <label class="label" for="an">Année académique</label>
                                    <div class="select">
                                        <select id="an"
                                        class="form-control @error('id_annee') is-invalid @enderror" 
                                        name="id_annee" required="required">
                                            @foreach($annees as $annee)
                                                <option value="{{ $annee->id }}">
                                                    {{ $annee->dateDebut }} au {{ $annee->dateFin }}
                                                </option>
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