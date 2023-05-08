<?php
    require('dataSource.php');
    session_start();
    $email = $_SESSION['email'];
    $fp = fopen(usuario,'r');
    $backup = fopen('backup.csv','w');
    while( ($linha = fgetcsv($fp)) !== false){
        if($linha[1] != $email){
            fputcsv($backup,$linha);
        }
    }
    fclose($fp);
    fclose($backup);
    rename('backup.csv',usuario);
?>