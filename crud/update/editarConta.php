<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    require('dataSource.php');
    session_start();
    if(isset($_POST['novoName'])){
        $fp = fopen(usuario,'r');
        $backup = fopen('backup.csv','w');
        while( ($linha = fgetcsv($fp)) !== false){
            if($linha[0] == $_POST['username']){
                $linha[0] = $_POST['novoName'];
                fputcsv($backup,$linha);
                continue;
            }
            fputcsv($backup, $linha);
        }
                
    }else if(isset($_POST['senha'])){
        $fp = fopen(usuario,'r');
        $backup = fopen('backup.csv','w');
        while( ($linha = fgetcsv($fp)) !== false){
            if($linha[1] == $_SESSION['email']){
                $linha[2] = $_POST['senha'];
                fputcsv($backup,$linha);
            }else{
                fputcsv($backup,$linha);
            }
        }
    }
    fclose($fp);
    fclose($backup);
    rename('backup.csv',usuario);
    header('location: /src/vizualizarData.php');

?>