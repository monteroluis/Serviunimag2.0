<?php 
    session_start();
    
    require_once (__DIR__.'/../mdb/mdbUsuario.php');
    $idUsuario = $_SESSION['ID_USUARIO'];
    borrarUsuario($idUsuario);
    header("Location: ../../vista/sesion.php");
?> 