<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    require('./dataSource.php');
    $data = [
        'info1' => $_POST['info1'],
        'info2' => $_POST['info2'],
        'info3' => $_POST['info3']
    ];
    $fp = fopen(crud2,'a');
    fputcsv($fp,$data);
    fclose($fp);
    header('location: /src/crud2/');
?>