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
                              Nom:
                              <input type="text" name="nom" value="{{ $agent->nom }}" class="form-control"  required>
                          </div>
                          <div class="form-group">
                              Prenom:
                              <input type="text" name="prenom" value="{{ $agent->prenom }}" class="form-control" required>
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>  
                        </div>
              </form>
            </div> 
          </div>
        </div>
      </div>

