<div class="modal fade" id="modaledit{{$approvisionnement->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modification d'un approvisionnement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
       
      <form action="{{ route('approvisionnements.update',$approvisionnement->id) }}" method="POST">
          @csrf
          @method('PUT')
     
           <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label class="label">Désignation</label>
                  <div class="select">
                      <select class="form-control" name="id_article">
                          @foreach($articles as $article)
                              <option name="libelle" value="{{ $article->id }}">{{ $article->libelle }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="form-group">
                <label class="label">Fournisseur</label>
                <div class="select">
                    <select class="form-control" name="id_fournisseur">
                        @foreach($fournisseurs as $fournisseur)
                            <option name="nom" value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="form-group">
                    <strong>Quantité:</strong>
                    <input type="number" name="quantite" value="{{ $approvisionnement->quantite }}" class="form-control" placeholder="la quantité reçue">
                </div>
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="date" value="{{ $approvisionnement->date }}" class="form-control" placeholder="date de l'achat">
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
  
    