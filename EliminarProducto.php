
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-A-Compatible" content="ie=edge">
    <title>ALGAR MercaTec</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Productos.css">
    <link rel="stylesheet" href="css/stylePHP.css">
</head>
<main class="contenedor">

<?php
    require ('conexion.php');
    $ID= $_POST['ID'];

    if($conexion->connect_error) {
        die("Conexión fallida: " . $conexion ->connect_error);
    }
    
    if(isset($ID)){
        $sql = 'DELETE from stock where ID = "'.$ID.'"';

        if($conexion->query($sql) == true){
                echo "<script> alert('Producto eliminado');</script>";
                $sql = 'DELETE from pedido where ID_producto = "'.$ID.'"';
                $conexion->query($sql);
                echo "<a href='AdminProv.php' class='boton boton-morado'>Volver </a>";
        }
    }
?>
</main>
</html>

