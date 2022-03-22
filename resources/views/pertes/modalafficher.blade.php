<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enregistrer une perte </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
            
                @endif  
                <form action="{{ route('pertes.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
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
                                <label for="perte">Perte:</label>
                                <input type="number" id="perte" name="qperdue" 
                                class="form-control @error('qperdue') is-invalid @enderror"
                                placeholder="La quantité perdue" required="required">
                                @error('qperdue') <p>Ce champs est incorrect</p>@enderror
                            </div>
                            <div class="form-group">
                               <label for="data">Date:</label>
                                <input type="date" id="data" name="date" 
                                class="form-control @error('date') is-invalid @enderror"
                                 required="required">
                                 @error('date') <p>Ce champs est incorrect</p>@enderror
                                 @include('flash::message')
                            </div> 
                            <div class="form-group">
                                <label class="label">Année académique</label>
                                    <div class="select">
                                        <select class="form-control" name="id_annee">
                                            @foreach($annees as $annee)
                                                <option value="{{ $annee->id }}">{{ $annee->libelle }}</option>
                                            @endforeach
                                        </select>
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