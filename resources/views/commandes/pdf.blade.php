<!DOCTYPE html>
<html>
    <head>
        <title>Téléchargement du PDF</title>
    <style>
        @page{
            margin-top: 45px; /* create space for header */
            margin-bottom: 7px; /* create space for footer */
        }
        td {
            text-align: center;
        }
        .tableau-style{
            border-collapse: collapse;
            min-width: 400px;
            width: 700px;
            box-shadow: 0 5px 50px rgba(0,0,0, 0.15);
            cursor: pointer;
            margin: 20px auto;
            border: 1px solid #ddd;
            margin-top: -2%
        }
        .entete{
            text-align: center;
            margin-top: -0.5%;
        }
        thead tr{
            background-color: black;
            color: #fff;

        }
        td{
            padding: 8px 10px;
        }
        tbody tr td th{
            border: 2px solid #ddd;
        }
        tbody tr:nth-child(even){
            background-color: #aca7a7;
        }
        tbody tr:last-of-type{
            border-bottom: 3px solid black;
        }
        hr {
            border: none;
            border-top: 3px double #333;
            color: #333;
            overflow: visible;
            text-align: center;
            height: 5px;
            width: 500px;
        }

        hr:after {
            background: #fff;
            content: '§';
            padding: 0 4px;
            position: relative;
            top: -13px;
           
        }
        hr{
            margin-top: -2%;
        }
        header{
            margin-top: -7%;
            text-align: center;
        }
        #titre{
            margin-top: -0%;
        }
        .page{  
            margin-left: 43%;
            float: left;
        }
        .time{
            margin-left: 0%;  
            float: left;
        }
        .promo{
            margin-left: 72%;
            float: left;
        }
        footer{
           width: 100%;
           margin-top: 116%;
           float: left;
        }
        .page:after { 
            /* counter-increment: page; */
            content: counter(page); 
        }
        </style>

    </head>
    <body>
        <header>
            <div>
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('vendors/images/iai.jpg'))) }}">
                <h4 id="titre"><strong>Institut Africain d'Informatique</strong> <br>
                    Etablissement Inter-Etats d'Enseignement Supérieur <br>
                    Représentation du TOGO(IAI-TOGO) <br>
                    07 BP 12456 Lomé 07,  TOGO Tel:(+228) 22 20 47 00 <br>
                    E-mail: iaitogo@iai-togo.tg
                </h4>
            </div>
            <hr>
        </header>
        <h2 class="entete">Liste des commandes de l'année en cours</h2>
        <footer>
            <div class="time" id="current_date"><?php echo date("d/m/y");?></div>
            <div class="promo">Généré par Mdme PASSAI</div>
            <div class="page">Page </div>
        </footer>
        <table class="tableau-style">
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
    </body>
</html>
