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
        .image{
            border-collapse: collapse;
            min-width: 400px;
            width: 900px;
            margin: 20px auto;
            margin-top: 2px;
        }
        </style>

    </head>
    <body>
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