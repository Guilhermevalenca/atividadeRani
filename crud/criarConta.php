<?php
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    require('dataSource.php');
    $data = [
        'user' => $_POST['username'],
        'email' => $_POST['email'],
        'senha' => $_POST['senha']
    ];
    $fp = fopen(usuario,'a');
    fputcsv($fp, $data);
    fclose($fp);
    session_start();
    $_SESSION['email'] = $data['email'];
    $_SESSION['autenticacao'] = true;
    header('location: /src/');
?>