<?php 
    require('./verificacaoAutencidade.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
</head>
<body>
    <button onclick="window.location.href = './crudJogos/' ">Jogos</button><br>
    <button onclick="window.location.href= '/src/vizualizarData.php'">Informações da conta</button><br>
    <button onclick="window.location.href='./sair.php'">Sair da conta</button>
</body>
</html>