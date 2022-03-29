<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enregistrer un fournisseur </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
                <div class="modal-body">
                      @if ($errors->any())
        
                      @endif  
                      <form action="{{ route('fournisseurs.store') }}" method="POST">
                              @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                      <label for="nom">Nom:</label>
                                        <input type="text" 
                                        name="nom" id="nom"
                                        class="form-control @error('nom') is-invalid @enderror"
                                        placeholder="nom du fournisseur" required="required">
                                        @error('nom') <p>Ce champs est incorrect</p>@enderror
                                    </div>
                                    <div class="form-group">
                                      <label for="conta">Contact</label>
                                      <input type="numeric" id="conta"
                                      name="contact" 
                                      class="form-control @error('contact') is-invalid @enderror"
                                      placeholder="contact" required="required">
                                      @error('contact') <p>Ce champs est incorrect</p>@enderror
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