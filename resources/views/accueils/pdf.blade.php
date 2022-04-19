<!DOCTYPE html>
<HTml>
    <HEAd>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>pdf</title>
        <link rel="stylesheet" type="text/css" href={{asset('vendors/styles/core.css')}}>
	<link rel="stylesheet" type="text/css" href={{asset('vendors/styles/icon-font.min.css')}}>
	<link rel="stylesheet" type="text/css" href={{asset('vendors/styles/style.css')}}>
        <link rel="stylesheet" type="text/css" href={{asset("vendors/DataTables/dataTables.bootstrap4.min.css")}}>
        <style>
            table{
            border-collapse: collapse;
            text-align: center;
            width: 60%;
            margin-top: 3%;
            margin-left: 20%;
            }
            #btn{
                margin-top: -1%; 
                margin-right: 20%;
            }

            td{
            border: 2px solid black;
            text-align: center;
            padding: 7px;
           
            }

            th{
            border: 4px solid black;
            padding: 5px;
            margin: 5px;
            }
            #img{
                margin-top: 1%;
                margin-left: 20%;
            }
        </style>
    </HEAd>
    <body>
        <div>
            <div id="img">
                <img src="{{asset('vendors/images/logo-icon.png')}}" alt="" class="light-logo"><span>IAI-TOGO Gestion de stock</span>
            </div>
            <div class="pull-right" id="btn">
				<a href={{route('download.pdf')}} class="btn btn-info">
					<i class="icon-copy dw dw-file-3"></i>
					Télécharger le PDF
				</a>
			</div>	
            <table>  
                <THead>
                    <tr class="ligne1">
                        <th>Article</th>
                        <th>Stock initial</th>
                        <th>Entrant</th>
                        <th>Stock total</th>
                        <th>Bésoins</th>
                        <th>Pertes</th>
                        <th>Stock final</th>
                        <th>Alerte</th>
                    </tr>
                </THead>
                {{-- <tbody>
                    @foreach ($articlestocks as $articlestock)
                        <tr>
                            <td>{{ $articlestock["article"] }}</td>
                            <td>{{ $articlestock["si"] }}</td> 
                            <td>{{ $articlestock["entree"] }}</td>
                            <td>{{ $articlestock["stocktotal"] }}</td>
                            <td>{{ $articlestock["livree"] }}</td>
                            <td>{{ $articlestock["perdue"] }}</td> 
                            <td>{{ $articlestock["stockfinal"] }} </td>

                            @if ($articlestock["stockfinal"] == 0)
                            <td><span class="btn btn-lg btn-danger" id="rond"></span></td> @endif

                            @if ($articlestock["stockfinal"] < 10 & $articlestock["stockfinal"] >0)
                            <td><span class="btn btn-lg btn-warning" id="rond"></span></td> @endif

                            @if ($articlestock["stockfinal"] >= 10)
                            <td><span class="btn btn-lg btn-success" id="rond"></span></td>
                            @endif
                        </tr> 
                    @endforeach
                </tbody> --}}
            </table> 
        </div>
    </body>
</html>