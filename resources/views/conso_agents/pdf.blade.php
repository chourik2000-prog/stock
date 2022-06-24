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
            width: 700px;
            box-shadow: 0 5px 50px rgba(0,0,0, 0.15);
            cursor: pointer;
            margin: 20px auto;
            border: 1px solid #ddd;
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
        header{
            margin-top: -7%;
        }
        #titre{
            margin-top: -0%;
        }
        </style>

    </head>
    <body>
        <header>
            <div style="text-align: center">
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
         <h3 style="text-align: center">Liste de consommation du personnel {{$demandeurs->nom}} {{$demandeurs->prenom}}</h3>
        <table class="tableau-style">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Quantité</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articlestocks as $articlestock)
                    <tr>
                        <td>{{ $articlestock["article"] }}</td>
                        <td>{{ $articlestock["livree"] }}</td>	
                        <td>{{ $articlestock["date"] }}</td>
                    </tr>	  
                @endforeach 
            </tbody>
        </table>
    </body>
</html>