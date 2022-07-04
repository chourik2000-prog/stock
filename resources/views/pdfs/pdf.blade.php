<!DOCTYPE html>
<html>
    <head>
        <title>Téléchargement du PDF</title>
    <style>
      .tableau{
            min-width: 400px;
            width: 700px;
            border-collapse:collapse;
        }
        thead th{
            border: 3px solid black;
            text-align: left;
        }
        td th{
            padding: 8px 10px;
        }
        tbody  td {
            border: 3px solid black;
        }
        #titre{
            margin-top: -5%;
            text-align: center;
        }
        .entete{
            text-align: center;
        }
        </style>

    </head>
    <body>
        <h4 id="titre"><strong>IAI-TOGO</strong> <br>  
        <h2 class="entete">Statistiques de l'année en cours</h2>
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
    </body>
</html>