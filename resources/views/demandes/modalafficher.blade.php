<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Article livré </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @if ($errors->any())
   
   </div>
@endif  
<form action="{{ route('demandes.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <label class="label">Demandeur</label>
            <div class="select">
                <select class="form-control" name="id_agent">
                    @foreach($agents as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>
          <div class="form-group">
            <label class="label">Désignation</label>
            <div class="select">
                <select class="form-control" name="id_article">
                    @foreach($articles as $article)
                        <option value="{{ $article->id }}">{{ $article->libelle }}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="form-group">
              <strong>Quantité livrée:</strong>
              <input type="number" name="qlivree" class="form-control" placeholder="La quantité sortant">
          </div>
            <div class="form-group">
                <strong>Date:</strong>
                <input type="date" name="date" class="form-control" placeholder="La date du jour">
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
 </div>
</div>