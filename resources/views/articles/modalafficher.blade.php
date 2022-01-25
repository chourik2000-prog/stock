<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un article </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @if ($errors->any())
   
   </div>
@endif  
<form action="{{ route('articles.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Libellé:</strong>
                <input type="text" name="libelle" class="form-control" placeholder="Le libellé de l'article">
            </div>
            <div class="form-group">
                <strong>Quantité:</strong>
                <input type="number" name="quantite" class="form-control" placeholder="La quantité entrant">
            </div>
            <div class="form-group">
                <strong>Date:</strong>
                <input type="date" name="date" class="form-control" placeholder="La date du jour">
            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Enregistrer</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button> 
      </div>
</form>
      </div>
    </div>
  </div>
</div>
 </div>
</div>