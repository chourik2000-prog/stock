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
        .entete{
            margin-top: 0.7%;
        }
        .time{
            text-align: right;
        }
        </style>

    </head>
    <body>
        <h3 id="titre"><strong>IAI-TOGO</strong></h3>
        <h3 class="entete">Liste des commandes de l'année en cours</h3>
        <table class="tableau">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Quantité</th>
                    <th>Année</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commandes as $commande)
                    <tr>
                        <td>{{ $commande->article->libelle}}</td>
                        <td>{{ $commande->quantite}}</td>
                        <td>
                            {{ $commande->annee->dateDebut}} au 
                            {{ $commande->annee->dateFin}}
                        </td>
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
