
@extends('deskapp.lay')
 
@section('content')
   <!-- basic table  Start -->
   <div class="col-md-6 col-sm-12">
       <h4 class="font-20 weight-500 mb-10 ">
           <div class="text-blue">Liste des besoins de l'agent:<td>{{$demandeurs->nom}} {{$demandeurs->prenom}}</td></div>
       </h4>
   </div>
   <div class="pd-20 card-box mb-30">
       <div class="clearfix mb-20">
           <div class="pull-left">
               <a href="{{route('consoagent.rech')}}" class="btn btn-primary">
                   <i class="icon-copy dw dw-left-arrow1"></i>
                   Voir pour un autre agent
               </a>
           </div>
        </div>			
           <table class="table" id="datatable">
               <thead>
                   <tr>
                       <th scope="col"> <strong> Articles</strong> </th>
                       <th scope="col"> <strong> Quantité</strong> </th>
                       <th scope="col"> <strong> Date</strong> </th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($demandes as $demande)
                   <tr>
                    <td>{{ $demande->article->libelle}}</td>
                    <td>{{ $demande->livree}}</td> 
                    <td>{{ $demande->date}}</td>	
                   </tr>	  
                   @endforeach 
               </tbody>
           </table>     
@endsection
@push('stylesheet')
   <link rel="stylesheet" href={{asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}>
   <link rel="stylesheet" href={{asset('src/plugins/datatables/css/responsive.bootstrap4.min.css')}}>
@endpush


@push('javascripts')
   <script src={{asset("vendors/DataTables/jquery.dataTables.min.js")}}></script>
   <script src={{asset("vendors/DataTables/dataTables.bootstrap4.min.js")}}></script>
   <script src={{asset("src/scripts/datatable.js")}}></script>
@endpush