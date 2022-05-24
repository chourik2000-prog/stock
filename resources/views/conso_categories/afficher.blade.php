
@extends('deskapp.lay')
 
@section('content')
   <!-- basic table  Start -->
   <div class="col-sm-12">
       <h4 class="weight-50">
           <div>Liste des besoins de la <td>{{$cat->libelle}}</td></div>
       </h4>
   </div>
   <br>
   <div class="pd-20 card-box mb-30">
       <div class="clearfix mb-20">
           <div class="pull-left">
               <a href="{{route('consocategorie.rech')}}" class="btn btn-primary">
                   <i class="icon-copy dw dw-left-arrow1"></i>
                   Voir pour une autre catégorie
               </a>
           </div>
        </div>			
            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th scope="col"> <strong> Nom</strong> </th>
                        <th scope="col"> <strong> Prenom</strong> </th>
                        <th scope="col"> <strong> Articles</strong> </th>
                        <th scope="col"> <strong> Quantité</strong> </th>
                        <th scope="col"> <strong> Date</strong> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articlestocks as $articlestock)
                        <tr>
                            <td>{{ $articlestock["nom"] }}</td>
                            <td>{{ $articlestock["prenom"] }}</td>
                            <td>{{ $articlestock["article"] }}</td>
                            <td>{{ $articlestock["livree"] }}</td>	
                            <td>{{ $articlestock["date"] }}</td>
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