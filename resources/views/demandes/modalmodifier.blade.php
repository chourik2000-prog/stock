<div class="modal fade" id="modaledit{{$demande->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enregistrement d'une demande d'article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
    <form action="{{ route('demandes.update',$demande->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Libellé:</strong>
                    <input type="text" name="libelle" value="{{ $demande->libelle }}" class="form-control" placeholder="Le libellé de l'article">
                </div>
                <div class="form-group">
                    <strong>Demandeur:</strong>
                    <input type="text" name="demandeur" value="{{ $demande->demandeur }}" class="form-control" placeholder="Le nom du demadeur d'article">
                </div>
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="date" value="{{ $demande->date }}" class="form-control">
                </div>
                <div class="form-group">
                    <strong>Quantité sortant:</strong>
                    <input type="number" name="qsortant" value="{{ $demande->qsortant }}" class="form-control" placeholder="La quantité sortant">
                </div>
            </div>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        
      </div>
        </div>
   
    </form>
      </div>
      
    </div>
  </div>
</div>