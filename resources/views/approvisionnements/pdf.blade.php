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
    </body>
</html>