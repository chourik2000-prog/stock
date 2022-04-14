<div class="modal fade" id="modaledit{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Enregistrement d'un utilisateur</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <form action="{{ route('users.update',$user->id) }}" method="POST">
                @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                              <label for="name">Nom:</label>
                                <input type="text" 
                                name="name" id="name"
                                value="{{ $user->name }}" 
                                class="form-control @error('name') is-invalid @enderror" 
                                required="required">
                                @error('name') <p>Ce champs est incorrect</p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" 
                                name="email" id="email"
                                value="{{ $user->email }}" 
                                class="form-control @error('email') is-invalid @enderror" 
                                required="required">
                                @error('email') <p>Ce champs est incorrect</p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe:</label>
                                <input type="password" 
                                name="password" id="password"
                                value="{{ $user->password }}" 
                                class="form-control @error('password') is-invalid @enderror" 
                                required="required">
                                @error('password') <p>Ce champs est incorrect</p>@enderror
                            </div>
                            <div class="form-group">
                                <label class="label" for="cat">Role</label>
                                <div class="select">
                                    <select id="id_role"
                                      class="form-control @error('id_role') is-invalid @enderror" 
                                      name="id_role" required="required">
                                      @foreach($roles as $role)
                                          <option name="name" value="{{ $role->id }}">{{ $role->name }}</option>
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

