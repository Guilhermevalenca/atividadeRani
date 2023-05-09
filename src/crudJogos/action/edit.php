<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    require('dataSource.php');
    $data = $_POST['info'];
    $fp = fopen(jogos,'r');
    $backup = fopen('backup.csv','w');
    while( ($linha = fgetcsv($fp)) !== false){
        if($linha[0] != $data[0]){
            fputcsv($backup,$linha);
        }else{
            fputcsv($backup,$data);
        }
    }
    fclose($fp);
    fclose($backup);
    rename('backup.csv',jogos);
    header('location: /src/crudJogos/');
?>