<?php 
    require('./verificacaoAutencidade.php');
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
    <?php 
        $fp = fopen('../crud/usuarios.csv','r');
    ?>
    <h2>Aqui estão seus dados:</h2>
    <table id="table">
    <?php 
        while( ($linha = fgetcsv($fp)) !== false):
    ?>
        <?php if($_SESSION['email'] == $linha[1]): ?>
            <tr>
                <th><?= $linha[1] ?></th>
            </tr>
            <tr>
                <td>
                    <form id="formEmail" action="/crud/editarConta.php" method="POST">
                        <input type="hidden" name="username" value="<?= $linha[0] ?>">
                        <input class="email" type="text" name="novoName" value="<?= $linha[0] ?>">
                        <input type="submit" value="Editar">
                    </form>
                </td>
            </tr>
            <tr id="verificarSenha">
                <td>
                    <input class="senhaAtual" type="hidden" name="senha" value="<?= $linha[2] ?>">
                    <input class="senhaAtual" type="password" name="confirme" placeholder="senha">
                    <button class="verificacao">envia</button>
                </td>
            </tr>
        <?php endif ?>
    <?php endwhile ?>
    </table>
    <p>OBS: para mudar sua senha é necessario digitar sua senha atual, logo apos confirma sua senha podera atualizar sua senha.</p>
    <button onclick="window.location.href='/crud/delete.php'">Deletar Conta</button>
    <script defer src="/script/update/senha.js"></script>
</body>
</html>