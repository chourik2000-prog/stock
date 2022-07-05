<!DOCTYPE html>
<html>
    <head>
        <title>Téléchargement du PDF</title>
    <style>
       @page{
            margin-top: 45px; /* create space for header */
            margin-bottom: 7px; /* create space for footer */
        }
        .tableau{
        min-width: 200px;
        width: 700px;
        border-collapse:collapse;
        margin: auto;
        }
        thead th{
            border: 1px solid black;
            text-align: left;
        }
        td th{
            padding: 4px 5px;
        }
        tbody  td {
            border: 1px solid black;
        }
        #titre{
            margin-top: -5%;
            text-align: left;
        }
        #titre2{
            margin-top: -5%;
            text-align: right;
        }
        .entete{
            text-align: center;
        }
        .time{
            text-align: right;
        }
        </style>
    </head>
    <body>
        <div>
            <h4 id="titre"><strong>IAI-TOGO</strong></h4>
            <h4 id="titre2">{{$demandeurs->nom}} {{$demandeurs->prenom}}</h4>
        </div>
        <h3 class="entete">Liste de besoins</h3>
        <table class="tableau">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Quantité</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articlestocks as $articlestock)
                    <tr>
                        <td>{{ $articlestock["article"] }}</td>
                        <td>{{ $articlestock["livree"] }}</td>	
                        <td>{{ $articlestock["date"] }}</td>
                    </tr>	  
                @endforeach 
            </tbody>
        </table>
        <br>
        <br>
        <footer>
            <div class="time"><?php echo date("d/m/y");?></div>
        </footer>
    </body>
</html>