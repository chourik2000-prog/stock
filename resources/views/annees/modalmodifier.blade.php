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
                                   Libellé:
                                    <input type="text" name="libelle" value="{{ $annee->libelle }}" class="form-control" placeholder="Le libellé" required>
                                </div>
                                <div class="form-group">
                                    Date de debut:
                                    <input type="date" name="dateDebut" value="{{ $annee->dateDebut }}" class="form-control" placeholder="La date" required>
                                </div>
                                <div class="form-group">
                                    Date de fin:
                                    <input type="date" name="dateFin" value="{{ $annee->dateFin }}" class="form-control" placeholder="La date" required>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="status" class="switch-input" id="checkbox"
                                     value="1" {{ old('status') ? 'checked="checked"' : '' }}/>
                                    <label for="status">Année active</label>
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
