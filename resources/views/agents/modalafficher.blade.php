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
<form action="{{ route('agents.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" name="nom" class="form-control" placeholder="Le nom de l'agent" required>
            </div>
            <div class="form-group">
                <strong>Prenom:</strong>
                <input type="text" name="prenom" class="form-control" placeholder="Le prenom de l'agent">
            </div>
            <div class="form-group">
              <label class="label">Catégorie</label>
              <div class="select">
                  <select class="form-control" name="idcat">
                      @foreach($categories as $categorie)
                          <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                      @endforeach
                  </select>
              </div>
          </div>

        </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-info">Enregistrer</button>
      <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button> 
      </div>
     </form>
      </div>
    </div>
  </div>
</div>
 </div>
</div>