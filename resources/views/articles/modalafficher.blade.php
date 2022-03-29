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
            
                @endif  
                    <form action="{{ route('articles.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="lib">Désignation:</label>
                                    <input type="text" 
                                    name="libelle" id="lib"
                                    class="form-control @error('libelle') is-invalid @enderror" 
                                    placeholder="Le libellé de l'article" required="required">
                                    @error('libelle') <p>Ce champs est incorrect</p>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="caracte">Caractéristiques:</label>
                                    <input type="text" id="caracte"
                                    name="caracteristique" 
                                    class="form-control @error('caracteristique') is-invalid @enderror" 
                                    placeholder="Les caractéristiques" required="required">
                                    @error('caracteristique') <p>Ce champs est incorrect</p>@enderror
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
