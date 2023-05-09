<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    require('./dataSource.php');
    $data = [
        'info1' => $_POST['info1'],
        'info2' => $_POST['info2'],
        'info3' => $_POST['info3'],
        'info4' => $_POST['info4']
    ];
    $fp = fopen(jogos,'a');
    fputcsv($fp,$data);
    fclose($fp);
    header('location: /src/crudJogos/');
?>