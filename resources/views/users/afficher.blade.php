
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
           <div class="pull-right">
               <a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#exampleModal">
                   + Ajouter
               </a>
           </div>
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
                       <td>{{ $user->role->name}}</td>
                   <td>
                       <form action="{{ route('users.destroy',$user->id) }}" method="POST">    
                           {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" 
                               data-target="#modaledit{{$user->id}}">
                               <a  href="#">
                                   <i class="dw dw-edit-1 text-white"></i>
                               </a>
                           </button> --}}
       
                           @csrf
                           @method('DELETE')
           
                           <button type="submit" class="btn btn-warning btn-sm" onClick='return confirmSubmit()'>
                               <a  href="#">
                                   <i class="dw dw-trash1 text-white"></i>
                               </a>
                           </button>
                       </form>
                   </td>
               </tr>
                   @include('users.modalmodifier')
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


