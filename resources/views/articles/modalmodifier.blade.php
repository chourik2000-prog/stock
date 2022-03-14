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
                                      Désignation:
                                      <input type="text" name="libelle" value="{{ $article->libelle }}" class="form-control" placeholder="Le libellé">
                                  </div>
                                  <div class="form-group">
                                    Caractéristiques:
                                    <input type="text" name="libelle" value="{{ $article->caracteristique }}" class="form-control" placeholder="Le libellé">
                                  </div>
                              </div>
                          </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
