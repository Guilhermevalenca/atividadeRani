<?php
    require('dataSource.php');
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    $user = $_POST['user'];
    $email = $_POST['email'];
    $usuarios = fopen(usuario,'r');
    while( ($linha = fgetcsv($usuarios)) !== false){
        if($user = $linha[0] || $email = $linha[1]){
            echo "proibidoPassagem";
            exit();
        }
    }
?>