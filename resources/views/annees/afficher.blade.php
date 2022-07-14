
@extends('deskapp.lay')
@section('content')
<!-- basic table  Start -->
   <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="font-20 weight-500 mb-10">
                    <div class="weight-600 font-30 text-blue">Années</div>
                </h4>
            </div>
            @if($user == "admin")			
                <div class="pull-right">
                    <a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#exampleModal"> + Ajouter</a>
                </div>
            @else
                <div class="pull-right">
                    <a class="btn btn-success btn-sm text-white" id="disabled" data-toggle="modal" data-target="#exampleModal"> + Ajouter</a>
                </div>
            @endif
        </div>
           @if ($message = Session::get('success'))
               <div class="alert alert-success">
                   <p>{{ $message }}</p>
               </div>
           @endif
               <table class="table" id="myTable">
                   <thead>
                       <tr>
                            <th scope="col"> <strong>Date de debut</strong> </th>
                            <th scope="col"> <strong>Date de fin</strong> </th>
                            <th scope="col"> <strong>Active</strong> </th>
                            <th scope="col"> <strong>Actions</strong> </th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($annees as $annee)
                        <tr>
                            <td>{{ $annee->dateDebut}}</td>
                            <td>{{ $annee->dateFin}}</td>
                            @if ($annee->status == 1)
                                <td> oui </td>   
                            @else
                                <td > non</td>
                            @endif
                            @if($user == "admin")
                                <td>
                                    <form action="{{ route('annees.destroy',$annee->id) }}" method="POST">    
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" 
                                            data-target="#modaledit{{$annee->id}}">
                                            <a  href="#">
                                                <i class="dw dw-edit-1 text-white"></i>
                                            </a>
                                        </button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form action="{{ route('annees.destroy',$annee->id) }}" method="POST">    
                                        <button type="button" id="disabled" class="btn btn-info btn-sm" data-toggle="modal" 
                                            data-target="#modaledit{{$annee->id}}">
                                            <a  href="#">
                                                <i class="dw dw-edit-1 text-white"></i>
                                            </a>
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
@include('annees.modalmodifier')
@endforeach
   </table>
   @include('annees.modalafficher')   
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