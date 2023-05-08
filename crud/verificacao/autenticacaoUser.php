<?php
    require('dataSource.php');
    $login = $_POST['email'];
    $senha = $_POST['senha'];
    $fp = fopen(usuario,'r');
    while( ($linha = fgetcsv($fp)) !== false){
        if($login == $linha[1] && $senha == $linha[2]){
            exit();
        }
    }
    echo "naoAutenticar";
?>
