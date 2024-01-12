<!DOCTYPE html>
<html lang="pt">

<head>
    <title>Fatura Recibo</title>

</head>

<body class="corpo-da-fatura">
    <div class="container-fatura">
        <div class="titulo-fatura"><h2>{{ $details['title'] }}</h2></div>
        <h5>Fatura-Recibo</h5>
        <div>
            <p><strong>Código da fatura:</strong> {{ $details['invoiceNumber'] }}</p>
            <p><strong>Cliente:</strong> {{ $details['user'] }}</p>
            <p class="data-de-compra"><strong>Data da Compra:</strong> {{ $details['dateCompra'] }}</p>

            <h5><strong>DADOS DA COMPRA </strong></h5>

            <table class="tabela">
                <tr class="titulos-tabela">
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                </tr>
                <tr class="dados-tabela">
                    <td>{{ $details['productName'] }}</td>
                    <td>{{ $details['productPrice'] }}</td>
                    <td>1</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>








<style>
    .tabela {
        border-collapse: collapse;
        width: 100%;
    }

    .tabela th,
    .tabela td {
        border: 1px solid #000;
        padding: 8px;
    }

    .corpo-da-fatura{
        font-family: "Montserrat Bold", sans-serif;
    }
    .titulos-tabela, .dados-tabela{
        text-align: center;
    }


    .titulo-fatura{
        text-align: center;
    }
</style>
