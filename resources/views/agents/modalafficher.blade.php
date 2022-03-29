<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enregistrer un personnel </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                @endif  

                @include('flash::message')
                <form action="{{ route('agents.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="nom">Nom:</label>
                                <input type="text" 
                                name="nom" id="nom"
                                class="form-control @error('nom') is-invalid @enderror"
                                placeholder="Le nom" required="required">
                                @error('nom') <p>Ce champs est incorrect</p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prenom:</label>
                                <input type="text" 
                                name="prenom" id="prenom"
                                class="form-control @error('prenom') is-invalid @enderror" 
                                placeholder="Le prenom" required="required">
                                @error('prenom') <p>Ce champs est incorrect</p>@enderror
                            </div>
                            <div class="form-group">
                                <label class="label" for="cat">Catégorie</label>
                                <div class="select">
                                    <select id="cat"
                                        class="form-control @error('idcat') is-invalid @enderror" 
                                        name="idcat" required="required">
                                        @foreach($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                        @endforeach
                                    </select>  
                                </div>
                                @error('idcat') <p>Ce champs est incorrect</p>@enderror
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