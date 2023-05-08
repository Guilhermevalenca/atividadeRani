<?php
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    require('./dataSource.php');
    $data = $_POST['info'];
    $fp = fopen(crud2,'r');
    $backup = fopen('backup.csv','w');
    while( ($linha = fgetcsv($fp)) !== false){
        if($linha[0] != $data[0]){
            fputcsv($backup,$linha);
        }
    }
    fclose($fp);
    fclose($backup);
    rename('backup.csv',crud2);
    header('location: /src/crud2/');
?>