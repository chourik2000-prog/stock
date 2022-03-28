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
            
                @endif  
                <form action="{{ route('annees.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="lib">Libellé:</label>
                                <input type="text" name="libelle" id="lib"
                                class="form-control @error('libelle') is-invalid @enderror" 
                                placeholder="Le libellé" 
                                required="required">
                                @error('libelle') <p>Ce champs est incorrect</p>@enderror
                            </div>
                            <div class="form-group">
                               <label for="date">Date de debut</label>
                                <input type="date" id="date" name="dateDebut" 
                                class="form-control @error('dateDebut') is-invalid @enderror" 
                                placeholder="Le libellé" required="required">
                                @error('dateDebut') <p>Ce champs est incorrect</p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="dat">Date de fin</label>
                                <input type="date" id="dat" name="dateFin" 
                                class="form-control @error('dateFin') is-invalid @enderror" 
                                placeholder="Le libellé" required="required">
                                @error('dateFin') <p>Ce champs est incorrect</p>@enderror
                            </div>
                         <div class="form-check">
                                <input class="form-check-input" name="status" 
                                    type="checkbox" value="true" id="status" checked="$annee->status">
                                <label class="form-check-label" for="status" >
                                 Année active
                                </label>
                               
                            </div> <br>
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
