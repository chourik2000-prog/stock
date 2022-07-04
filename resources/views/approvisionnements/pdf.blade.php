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
        .thead {
            border: 3px solid black;
            text-align: left;
        }
        .th{
            border: 3px solid black;
            text-align: left;
        }
        .td {
            padding: 8px 10px;
        }
        .th{
            padding: 8px 10px;
        }
        .tbody {
            border: 3px solid black;
        }
        .td {
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
            <thead class="thead">
                <tr class="tr">
                    <th class="th">Article</th>
                    <th class="th">Fournisseur</th>
                    <th class="th">Quantité</th>
                    <th class="th">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($approvisionnements as $approvisionnement)
                    <tr class="tr">
                        <td class="td">{{ $approvisionnement->article->libelle}}</td>
                        <td class="td">{{ $approvisionnement->fournisseur->nom}}</td>
                        <td class="td">{{ $approvisionnement->qentrant}}</td>
                        <td class="td">{{ $approvisionnement->date}}</td>
                    </tr> 
                    @endforeach
            </tbody>
        </table>
    </body>
</html>