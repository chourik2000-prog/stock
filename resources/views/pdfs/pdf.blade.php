<!DOCTYPE html>
<html>
    <head>
        <title>Téléchargement du PDF</title>
    <style>
      .tableau{
            margin-top: 3%;
            min-width: 400px;
            width: 700px;
            border-collapse:collapse;
        }
        thead th{
            border: 2px solid black;
            text-align: left;
        }
        td th{
            padding: 4px 5px;
        }
        tbody  td {
            border: 2px solid black;
            text-transform: uppercase;
        }
        #titre{
            margin-top: -5%;
            position: fixed;
        }
        .entete{
            margin-top: 0.2%;
        }
        .time{
            text-align: right;
        }
        </style>

    </head>
    <body>
        <h3 id="titre"><strong>IAI-TOGO</strong></h3> 
        <h3 class="entete">Fiche de stock de l'année en cours</h3>
        <table class="tableau">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Stock initial</th>
                    <th>Entrant</th>
                    <th>Stock total</th>
                    <th>Bésoins</th>
                    <th>Pertes</th>
                    <th>Stock final</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articlestocks as $articlestock)
                    <tr>
                        <td> {{ $articlestock["article"] }} </td>
                        <td> {{ $articlestock["si"] }} </td> 
                        <td> {{ $articlestock["entree"] }} </td>
                        <td> {{ $articlestock["stocktotal"] }} </td>
                        <td> {{ $articlestock["livree"] }} </td>
                        <td> {{ $articlestock["perdue"] }} </td> 
                        <td> {{ $articlestock["stockfinal"] }} </td>
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