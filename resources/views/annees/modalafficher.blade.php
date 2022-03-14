<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter une année académique</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               @if ($errors->any())
            </div>
          @endif  
              <form action="{{ route('annees.store') }}" method="POST">
          @csrf
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Libellé:</strong>
                      <input type="text" name="libelle" class="form-control" placeholder="Le libellé">
                  </div>
                  <div class="form-group">
                    <strong>Date de debut:</strong>
                    <input type="date" name="dateDebut" class="form-control" placeholder="Le libellé">
                </div>
                <div class="form-group">
                    <strong>Date de fin:</strong>
                    <input type="date" name="dateFin" class="form-control" placeholder="Le libellé">
                </div>
               
                <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="status" name="status" class="custom-control-input">
                    <label class="custom-control-label" for="status">Année active</label>
                </div>
              </div>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
      </div>
</form>
    </div>
  </div>
</div>
