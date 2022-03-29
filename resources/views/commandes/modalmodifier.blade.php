<div class="modal fade" id="modaledit{{$commande->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enregistrer un bon de commande</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('commandes.update',$commande->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="select">   
                                <div class="form-group">
                                    <label class="label" for="design">Désignation</label>
                                        <select id="design"
                                            class="form-control @error('id_article') is-invalid @enderror"  
                                            name="id_article" required="required">
                                            @foreach($articles as $article)
                                                <option name="libelle" value="{{ $article->id }}">{{ $article->libelle }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_article') <p>Ce champs est incorrect</p>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="quant">Quantité:</label>
                                    <input type="number" id="quant"
                                    name="quantite" value="{{ $commande->quantite }}" 
                                    class="form-control @error('quantite') is-invalid @enderror"
                                    required="required">
                                    @error('quantite') <p>Ce champs est incorrect</p>@enderror
                                </div>
                                <div class="form-group">
                                    <label class="label" for="an">Année académique</label>
                                        <select id="an"
                                            class="form-control @error('id_annee') is-invalid @enderror" 
                                            name="id_annee" required="required">
                                            @foreach($annees as $annee)
                                                <option name="libelle" value="{{ $annee->id }}">{{ $annee->libelle }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_annee') <p>Ce champs est incorrect</p>@enderror
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