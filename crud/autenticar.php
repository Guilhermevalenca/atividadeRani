<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    session_start();
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['autenticacao'] = true;
    header('location: /src/');
?>