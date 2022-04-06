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
                                    <label for="dateDebut">Date de debut:</label>
                                    <input type="date" id="dateDebut"
                                    name="dateDebut" 
                                    value="{{ $annee->dateDebut }}" 
                                    class="form-control @error('dateDebut') is-invalid @enderror"
                                    placeholder="La date" required="required">
                                    @error('dateDebut') <p>Ce champs est incorrect</p>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="data">Date de fin:</label>
                                    <input type="date" id="data"
                                    name="dateFin" 
                                    value="{{ $annee->dateFin }}" 
                                    class="form-control @error('dateFin') is-invalid @enderror"
                                    placeholder="La date" required="required">
                                    @error('dateFin') <p>Ce champs est incorrect</p>@enderror
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="status" 
                                    type="checkbox" value="" id="status"
                                    {{  $annee->status == 1 ? 'checked="checked"' : '' }}>
                                    <label class="form-check-label" for="status">
                                     Année active
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
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
