<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enregistrer un utilisateur</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              @if ($errors->any())
              @endif  

              @include('flash::message')
              <form action="{{ route('users.store') }}" method="POST">
                  @csrf
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <label for="name">Nom:</label>
                              <input type="text" 
                              name="name" id="name"
                              class="form-control @error('name') is-invalid @enderror"
                              placeholder="Le nom" required="required">
                              @error('name') <p>Ce champs est incorrect</p>@enderror
                          </div>
                          <div class="form-group">
                              <label for="email">Email:</label>
                              <input type="email" 
                              name="email" id="prenom"
                              class="form-control @error('email') is-invalid @enderror" 
                              placeholder="Votre adresse mail" required="required">
                              @error('email') <p>Ce champs est incorrect</p>@enderror
                          </div>
                          <div class="form-group">
                            <label for="password">Mot de passe:</label>
                            <input type="password" 
                            name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" 
                            placeholder="Votre mot de passe" required="required">
                            @error('password') <p>Ce champs est incorrect</p>@enderror
                        </div>
                          {{-- <div class="form-group">
                              <label class="label" for="id_role">Role</label>
                              <div class="select">
                                  <select id="id_role"
                                      class="form-control @error('id_role') is-invalid @enderror" 
                                      name="id_role" required="required">
                                      @foreach($roles as $role)
                                          <option value="{{ $role->id }}">{{ $role->name }}</option>
                                      @endforeach
                                  </select>  
                              </div>
                              @error('id_role') <p>Ce champs est incorrect</p>@enderror
                          </div> --}}
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