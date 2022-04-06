<div class="modal fade" id="modaledit{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modifier d'un artcle</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('articles.update',$article->id) }}" method="POST">
                     @csrf
                      @method('PUT')
                          <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="form-group">
                                     <label for="libelle"> Désignation:</label>
                                      <input type="text" 
                                      name="libelle" id="libelle"
                                      value="{{ $article->libelle }}" 
                                      class="form-control @error('libelle') is-invalid @enderror" 
                                      placeholder="Le libellé" required="libelle">
                                      @error('libelle') <p>Ce champs est incorrect</p>@enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="caracteristique">Caractéristiques:</label>
                                    <input type="text" 
                                    name="caracteristique" id="caracteristique"
                                    value="{{ $article->caracteristique }}" 
                                    class="form-control @error('caracteristique') is-invalid @enderror" 
                                    placeholder="Le libellé" required="required">
                                    @error('caracteristique') <p>Ce champs est incorrect</p>@enderror
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
