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
        {{-- <div class="image">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADcAAAA3CAYAAACo29JGAAAABHNCSVQICAgIfAhkiAAAA3hJREFUaEPtmr9vUlEUx7/3FfvTWAKDSR2sifFHGluI0cFFqnYwsRb/gtLBpCZNBHRwszUxcQL+AKOYtIOTdHLQRoiDcRHo1kQjTm2t0Jc4+JN7zC28irThvft49GHyGOH8+pxz7rnnAQzBpRAYHqPVL0ISqYtTrXZTa5/h2hLtmUPio0iNpffKnwNnWaadylmWSjhtaVkunba0LJVOW1qXSqctrculMy0ty6XTlpal0oJpecwFXOoG/J36Ua2uA99+NJbr6PiN3q7XODl2Qd9gY4nmzty5LmCqz3gMRuA0a92dqxi+PGDc+E5J83BeBXjglvMtAycs9/VmMDQWkHPyV9o83HgPcLVHzq8snGjR01f2yTmxAu72AeC4S86vLJywfnaCyTlx4HTy5VSuLkFOW9YlxDlzux8h81eBc+bsP3MFAIel75L/onLBV4MAD0nD3e8P4WCHXFL2fFpKU1UVNrJpMJyXUnfgKuk68eErAm9KmJ4vJMFosPIuUxkhxzjlhtX4ol5iTe9taFHlbswXMP5yDYfWGz/3EZHKwJKc8zm/mlB3A20buDP5TczFV3Sh6iEEpMJYZLgYS9Z/1hZwEy/WcC+2otdlDT8nQtJXiv3z+5/tcFaAadT1gLbCiVZ8eGe5qYrtUCZERkqxxNb4MW35SzYFYEJKv+4qeD75FgOfv0uZMCLMy/yIX00UzMMVs2EQ4kacbcvUwImpOL3wSUrdsDDRk5FSPGQebjPrRpkKAOs37LQGrlVV02IR1TMPJ6xsZn0oU9owYBVOXNBPZ94ZzokpQUKkObgKoBscIXAEdYPYKB7Fz1/7Zx69776+8LFLV74pAVpsHs5EAHlPJAnGJk2oSqhQxh44b0S0stzSLYGliTpwJpLWUCXvjaQAJndHSgZBhLw9lfNEZ8FwVzJeSXGbztyy91aQQM8ko5UTt+QqkHO5LZ3zRFXGYHwBkPTjKnO/LW0p4sx7IgkwdlMyZoPilBkpxgO2wWXdYTdTlEIrqqeU+egpNZG2DU6UYNkbDREs/iNrdWkW9m2Fq7anZduKGP++Usxn6yVef3CsWMcEGHEeqP2yyPbKaaB5TzQMJvl8qCnXtGJt4toGTgSVdYcHFYXNGl+qKaOUaVYMj93GaFvBaQFWIJUgGIl/Mri1JXtrpWKkgljKxXl6SE3kGt0NfwB4ZdvCFbo/ZgAAAABJRU5ErkJggg==" alt=""/><h3> IAI-TOGO gestion de stock</h3>
        </div> --}}
        <table class="tableau-style">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Stock initial</th>
                    <th>Entrant</th>
                    <th>Stock total</th>
                    <th>Bésoins</th>
                    <th>Pertes</th>
                    <th>Stock final</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articlestocks as $articlestock)
                    <tr>
                        <td> {{ $articlestock["article"] }} </td>
                        <td> {{ $articlestock["si"] }} </td> 
                        <td> {{ $articlestock["entree"] }} </td>
                        <td> {{ $articlestock["stocktotal"] }} </td>
                        <td> {{ $articlestock["livree"] }} </td>
                        <td> {{ $articlestock["perdue"] }} </td> 
                        <td> {{ $articlestock["stockfinal"] }} </td>
                    </tr> 
                    @endforeach
            </tbody>
        </table>
    </body>
</html>