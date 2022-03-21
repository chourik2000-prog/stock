<div class="modal fade" id="modaledit{{$categorie->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Catégorie de personnel</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
              </div>
            <div class="modal-body">
                <form action="{{ route('categories.update',$categorie->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="libelle">Catégorie:</label>
                                    <input type="text" 
                                    name="libelle" id="libelle"
                                    value="{{ $categorie->libelle }}" 
                                    class="form-control @error('libelle') is-invalid @enderror" 
                                    placeholder="désignation" required="required">
                                    @error('libelle') <p>Ce champs est incorrect</p>@enderror
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div> 
        </div>
    </div>
</div>

  