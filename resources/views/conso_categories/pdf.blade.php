<!DOCTYPE html>
<html>
    <head>
        <title>Téléchargement du PDF</title>
    <style>
        .tableau{
        margin-top: 3%;
        min-width: 200px;
        width: 700px;
        border-collapse:collapse;
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
            text-transform: uppercase;
        }
        #titre{
            margin-top: -5%;
            position: fixed;
        }
        #titre2{
            margin-top: -5%;
            margin-left: 65%;
            position: fixed;
        }
        .entete{
            margin-top: 0.7%;
        }
        .time{
            text-align: right;
        }
        </style>

    </head>
    <body>
        <div>
            <h4 id="titre"><strong>IAI-TOGO</strong></h4>
            <h4 id="titre2"><strong>{{$cat->libelle}}</strong></h4>
        </div>
        <h3 class="entete">Liste des besoins</h3>
        <table class="tableau">
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
        <br>
        <br>
        <footer>
            <div class="time" id="current_date"><?php echo date("d/m/y");?></div>
        </footer>
    </body>
</html>