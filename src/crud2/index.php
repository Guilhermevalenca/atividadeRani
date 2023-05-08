<?php 
    require('../verificacaoAutencidade.php');
    require('./dataSource.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>informações:</h2>
    <table>
        <thead>
            <th>nome</th>
            <th>tipo</th>
            <th>data</th>
        </thead>
        <tbody>
        <?php $fp = fopen(crud2,'r'); ?>
        <?php while( ($linha = fgetcsv($fp)) !== false): ?>
            <tr>
                <td><?= $linha[0] ?></td>
                <td><?= $linha[1] ?></td>
                <td><?= $linha[2] ?></td>
                <td>
                    <form action="./action/delete.php" method="POST">
                        <input type="hidden" name="info[]" value="<?= $linha[0] ?>">
                        <input type="hidden" name="info[]" value="<?= $linha[1] ?>">
                        <input type="hidden" name="info[]" value="<?= $linha[2] ?>">
                        <input type="submit" value="deletar">
                    </form>
                </td>
                <td>
                    <form action="./editar.php" method="GET">
                        <input type="hidden" name="info[]" value="<?= $linha[0] ?>">
                        <input type="hidden" name="info[]" value="<?= $linha[1] ?>">
                        <input type="hidden" name="info[]" value="<?= $linha[2] ?>">
                        <input type="submit" value="editar">
                    </form>
                </td>
            </tr>
        <?php endwhile ?>
        </tbody>
    </table>
    <form id="formAdd" action="./action/add.php" method="POST">
        <input id="pk" required type="text" name="info1" placeholder="primeira informação">
        <input required type="text" name="info2" placeholder="segunda informação">
        <input required type="text" name="info3" placeholder="terceura informação">
        <input type="submit">
    </form>
    <script>
        const formAdd = document.querySelector('#formAdd');
        const chave = document.querySelector('#pk');
        formAdd.addEventListener('submit', (event) => {
            event.preventDefault();
            const verificar = new XMLHttpRequest();
            verificar.onreadystatechange = function () {
                if(this.readyState === 4 && this.status === 200){
                    if(this.responseText == "jaRealizado"){
                        alert('cadastro ja realizado');
                    }else{
                        formAdd.submit();
                    }
                }
            }
            const data = new FormData();
            data.append('pk',chave.value);
            verificar.open('POST', './verificacoes/verificarExist.php',true);
            verificar.send(data);
        })
    </script>
</body>
</html>