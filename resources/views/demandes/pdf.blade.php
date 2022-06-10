<!DOCTYPE html>
<html>
    <head>
        <title>Téléchargement du PDF</title>
    <style>
        td {
            text-align: center;
        }
        .tableau-style{
            border-collapse: collapse;
            min-width: 400px;
            width: 900px;
            box-shadow: 0 5px 50px rgba(0,0,0, 0.15);
            cursor: pointer;
            margin: 20px auto;
            border: 1px solid #ddd;
        }
        thead tr{
            background-color: midnightblue;
            color: #fff;

        }
        tr{
            padding: 15px 15px;
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
            border-bottom: 3px solid midnightblue;
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
        </style>

    </head>
    <body>
        <div>
            <div style="text-align: center">
                 <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('vendors/images/iai.jpg'))) }}">
                 <h4><strong>Institut Africain d'Informatique</strong> <br>
                     Etablissement Inter-Etats d'Enseignement Supérieur <br>
                     Représentation du TOGO(IAI-TOGO) <br>
                     07 BP 12456 Lomé 07,  TOGO Tel:(+228) 22 20 47 00 <br>
                     E-mail: iaitogo@iai-togo.tg
                 </h4>
             </div>
             <hr>
         </div>
         <H3 style="text-align: center">Liste des demandes de l'année en cours</H3>
        <table class="tableau-style">
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
    </body>
</html>