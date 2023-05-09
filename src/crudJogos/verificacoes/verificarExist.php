<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    require('./dataSource.php');
    $fp = fopen(jogos,'r');
    while( ($linha = fgetcsv($fp)) !== false){
        if($linha[0] == $_POST['pk']){
            echo "jaRealizado";
            exit();
        }
    }
?>