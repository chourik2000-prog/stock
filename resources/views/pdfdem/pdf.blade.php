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
                text-align: center;
            }
            .entete{
                text-align: center;
            }
            .time{
            text-align:right;
            }
        </style>

    </head>
    <body>
        <div>
            <h2 id="titre"><strong>IAI-TOGO</strong></h2>
        </div>
        <h2 class="entete">Liste des demandes de l'année en cours</h2>
        <table class="tableau">
            <thead>
                <tr>
                    <th>Demandeur</th>
                    <th>Article</th>
                    <th>Quantité</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($demandes as $demande)
                    <tr>
                        <td>{{ $demande->agent->nom}}</td>
                        <td>{{ $demande->article->libelle}}</td>
                        <td>{{ $demande->qlivree}}</td>
                        <td>{{ $demande->date}}</td>
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