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
                                        <select 
                                            class="form-control @error('id_article') is-invalid @enderror"  
                                            name="id_article" required="required">
                                            @foreach($articles as $article)
                                                <option name="libelle" value="{{ $article->id }}">{{ $article->libelle }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_article') <p>Ce champs est incorrect</p>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="qperdue">Perte:</label>
                                    <input type="number" id="qperdue"
                                    name="qperdue" value="{{ $perte->qperdue }}" 
                                    class="form-control @error('qperdue') is-invalid @enderror"
                                    required="required">
                                    @error('qperdue') <p>Ce champs est incorrect</p>@enderror
                                </div>
                                <div class="form-group">
                                  <label for="date">Date:</label>
                                    <input type="date" name="date" id="date"
                                     value="{{ $perte->date }}" 
                                     class="form-control" 
                                     required="required">
                                </div>
                                <div class="form-group">
                                    <label class="label">Année académique</label>
                                        <select 
                                            class="form-control @error('id_annee') is-invalid @enderror" 
                                            name="id_annee" required="required">
                                            @foreach($annees as $annee)
                                                <option name="libelle" value="{{ $annee->id }}">{{ $annee->libelle }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_annee') <p>Ce champs est incorrect</p>@enderror
                                </div> 
                            </div>
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