<!DOCTYPE html>
<html>
    <head>
        <title>Téléchargement du PDF</title>
        <style>
            /* @page { margin: -5% -5%; } */
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
                text-transform: uppercase;
            }
            #titre{
                margin-top: -5%;
                text-align: center;
                position: fixed;
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
        <h2 id="titre"><strong>IAI-TOGO</strong></h2>
        <h2 class="entete">Liste des approvisionnements de l'année en cours</h2>
        <table class="tableau">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Fournisseur</th>
                    <th>Quantité</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($approvisionnements as $approvisionnement)
                    <tr>
                        <td>{{ $approvisionnement->article->libelle}}</td>
                        <td>{{ $approvisionnement->fournisseur->nom}}</td>
                        <td>{{ $approvisionnement->qentrant}}</td>
                        <td>{{ $approvisionnement->date}}</td>
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