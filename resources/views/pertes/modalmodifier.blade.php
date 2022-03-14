<div class="modal fade" id="modaledit{{$perte->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enregistrer une perte</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        <div class="modal-body">
    <form action="{{ route('pertes.update',$perte->id) }}" method="POST">
          @csrf
          @method('PUT')
           <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="select">   
                    <div class="form-group">
                        <label class="label">Désignation</label>
                            <select class="form-control" name="id_article">
                                @foreach($articles as $article)
                                    <option name="libelle" value="{{ $article->id }}">{{ $article->libelle }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        Perte:
                        <input type="number" name="perte" value="{{ $perte->qperdue }}" class="form-control" >
                    </div>
                    <div class="form-group">
                        Date:
                        <input type="date" name="date" value="{{ $perte->date }}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label class="label">Année académique</label>
                            <select class="form-control" name="id_annee">
                                @foreach($annees as $annee)
                                    <option name="libelle" value="{{ $annee->id }}">{{ $annee->libelle }}</option>
                                @endforeach
                            </select>
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