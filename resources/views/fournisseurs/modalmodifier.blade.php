<div class="modal fade" id="modaledit{{$fournisseur->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('fournisseurs.update',$fournisseur->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="nom">Nom:</label>
                                    <input type="text" 
                                    name="nom" id="nom"
                                    value="{{ $fournisseur->nom }}" 
                                    class="form-control @error('nom') is-invalid @enderror"
                                    placeholder="nom du fournisseur" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact:</label>
                                    <input type="number" 
                                    name="contact" id="contact"
                                    value="{{ $fournisseur->contact }}" 
                                    class="form-control @error('contact') is-invalid @enderror"
                                    placeholder="numéro téléphonique" required="required">
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
  
    