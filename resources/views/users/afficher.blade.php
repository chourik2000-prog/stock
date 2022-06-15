
@extends('deskapp.lay')
 
@section('content')
   <!-- basic table  Start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="font-20 weight-500 mb-10">
                    <div class="weight-600 font-30 text-blue">Utilisateurs</div>
                </h4>
            </div>
            {{-- @if($utilisateur == 2)		
                <div class="pull-right">
                    <a class="btn btn-success btn-sm text-white" id="disabled" data-toggle="modal" data-target="#exampleModal">
                        + Ajouter
                    </a>
                </div>
            @else --}}
                <div class="pull-right">
                    <a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#exampleModal">
                        + Ajouter
                    </a>
                </div>
            {{-- @endif --}}
        </div>	
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table" id="myTable">
            <thead>
                <tr>
                   <th scope="col"> <strong>Nom</strong> </th>
                   <th scope="col"> <strong>Mot de passe</strong> </th>
                   <th scope="col"> <strong>Role</strong> </th>
                   <th scope="col"> <strong> Actions</strong> </th>
                </tr>
            </thead>
            <tbody>
               @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->password}}</td>
                    @if ($user->role)
                    <td>{{ $user->role->name}}</td>
                    @endif
                    {{-- @if($utilisateur == 2)
                        <td>
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">    
                            @csrf
                            @method('DELETE')
                                <button type="submit" id="disabled" class="btn btn-warning btn-sm" onClick='return confirmSubmit()'>
                                    <a  href="#">
                                        <i class="dw dw-trash1 text-white"></i>
                                    </a>
                                </button>
                            </form>
                        </td>
                    @else --}}
                        <td>
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">    
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-warning btn-sm" onClick='return confirmSubmit()'>
                                    <a  href="#">
                                        <i class="dw dw-trash1 text-white"></i>
                                    </a>
                                </button>
                            </form>
                        </td>
                    {{-- @endif --}}
                </tr>
               @endforeach
               </tbody>
           </table>
       </div>
@include('users.modalafficher')     
@endsection

<script>
   function confirmSubmit()
   {
       var agree=confirm("Êtes-vous sûr de vouloir supprimer?");
       if (agree)
       return true ;
       else
       return false ;
   }
</script>


