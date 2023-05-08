<?php 
    session_start();
    if($_SESSION['autenticacao'] == true){
        header('location: /src/');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina princpal</title>
</head>
<body>
    <h1>Pagina principal</h1>
    <h2>Realize seu login:</h2>
    <form id="formLogin" action="/crud/autenticar.php" method="POST">
        <input class="email" type="email" name="email" placeholder="email" required>
        <input id="senha" type="password" name="senha" placeholder="senha" required>
        <input type="submit" value="entrar">
    </form>
    <h2>Crie sua conta:</h2>
    <form id="formCreate" action="/crud/criarConta.php" method="POST">
        <input required id="user" type="text" name="username" placeholder="nickname">
        <input required class="email" type="email" name="email" placeholder="email">
        <input required class="senha" type="password" name="senha" placeholder="senha">
        <input required class="senha" type="password" name="confirme" placeholder="confirme">
        <input type="submit" value="Criar conta">
    </form>
    <script defer src="/script/verificarAdicionarUser.js"></script>
    <script defer src="/script/verificarExistUser.js"></script>
</body>
</html>