<!DOCTYPE html>
<html>
    <head>
        <title>Téléchargement du PDF</title>
    <style>
       .tableau{
        min-width: 200px;
        width: 500px;
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
            text-align: center;
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
            <h2 id="titre"><strong>IAI-TOGO</strong></h2>
        </div>
        <h2 class="entete">Liste des commandes de l'année en cours</h2>
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
        <footer>
            <div class="time"><?php echo date("d/m/y");?></div>
        </footer>
    </body>
</html>
