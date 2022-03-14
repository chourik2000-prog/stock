<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Catégorie de personnel </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
            </div>
                @endif  
          <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                  Libellé:
                                  <input type="text" name="libelle" class="form-control" placeholder="Le titre du personnel">
                            </div>
                        </div>
                    </div>
          </div>
                    <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button> 
                          <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
          </form>
      </div>
    </div>
  </div>
</div>