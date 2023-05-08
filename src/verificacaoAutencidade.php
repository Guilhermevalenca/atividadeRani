<?php 
    session_start();
    if(!isset($_SESSION['autenticacao']) || !$_SESSION['autenticacao']){
        header('location: /');
        exit();
    }
?>