<div class="modal fade" id="modaledit{{$agent->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enregistrement d'un personnel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
              <div class="modal-body">
                  <form action="{{ route('agents.update',$agent->id) }}" method="POST">
                  @csrf
                      @method('PUT')
                      <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <label for="nom">Nom:</label>
                                  <input type="text" 
                                  name="nom" id="nom"
                                  value="{{ $agent->nom }}" 
                                  class="form-control @error('nom') is-invalid @enderror" 
                                  required="required">
                                  @error('nom') <p>Ce champs est incorrect</p>@enderror
                              </div>
                              <div class="form-group">
                                  <label for="prenom">Prenom:</label>
                                  <input type="text" 
                                  name="prenom" id="prenom"
                                  value="{{ $agent->prenom }}" 
                                  class="form-control @error('prenom') is-invalid @enderror" 
                                  required="required">
                                  @error('prenom') <p>Ce champs est incorrect</p>@enderror
                              </div>
                              <div class="form-group">
                                  <label class="label">Catégorie</label>
                                  <div class="select">
                                      <select class="form-control" name="idcat">
                                          @foreach($categories as $categorie)
                                              <option name="libelle" value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
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

