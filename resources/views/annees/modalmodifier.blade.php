<div class="modal fade" id="modaledit{{$annee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier une année académique</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('annees.update',$annee->id) }}" method="POST">
                   @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Libellé:</strong>
                                    <input type="text" name="libelle" value="{{ $annee->libelle }}" class="form-control" placeholder="Le libellé">
                                </div>
                                <div class="form-group">
                                    <strong>Date de debut:</strong>
                                    <input type="date" name="dateDebut" value="{{ $annee->dateDebut }}" class="form-control" placeholder="La date">
                                </div>
                                <div class="form-group">
                                    <strong>Date de fin:</strong>
                                    <input type="date" name="dateFin" value="{{ $annee->dateFin }}" class="form-control" placeholder="La date">
                                </div>
                                <div class="form-group">
                                    <strong>Active:</strong>
                                    <div class="custom-control custom-checkbox mb-5">
                                      <input type="checkbox" name="status" class="custom-control-input" id="status">
                                      <label class="custom-control-label" for="customCheck2">Année active</label>
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
