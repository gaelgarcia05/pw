<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-A-Compatible" content="ie=edge">
    <title>ALGAR MercaTec</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Normalize.css">
    <link rel="stylesheet" href="css/stylePHP.css">
    <link rel="stylesheet" href="css/Productos.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="fondo">
    <?php require('Header.php'); ?>

    <main class="site-main-carrito contenedor">
        <div class="centrar-texto-eliminar">
                <h1>Se ha eliminado del carrito</h1>
        </div>
        <div class="centrar-texto-eliminar">
          <a href="carrito.php" class="boton boton-pastel">Volver</a>
        </div>

    </main>

    <?php require('footer.php') ?>
</body>
</html>

<?php
require ('conexion.php');
$ID_Producto = $_POST['ProductoaEliminar'];
        $sql = "DELETE FROM pedido where ID_Producto like '$ID_Producto' and Usuario like '$usuario'";
        if($conexion->query($sql) == true){
        }
            else {
                die("Error al eliminar datos: ". $conexion->error);
                }
    $conexion->close();
?>