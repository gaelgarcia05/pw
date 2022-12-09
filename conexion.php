<?php
    session_start();

    if ( isset($_SESSION['User']))
    {
        $VarSession = $_SESSION['User'];
        $usuario = $_SESSION['User'];
    }
    else
    {
        $VarSession = NULL;
        $usuario = NULL;
    }

    $ArregloPrecio = array();
    $ArregloCantidad = array();
    $Total = 0;
    $ArregloID_Producto = array();
    $servidor = "localhost";
    $nombreusuario = "root";
    $password= "";
    $db ="algar";

    $conexion = new mysqli($servidor,$nombreusuario,$password,$db);
?>