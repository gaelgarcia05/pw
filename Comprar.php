<?php
require ('conexion.php');

    $Precio = $_POST['Precio'];
    $Imagen= $_POST['Imagen'];
    $Nombre = $_POST['Nombre'];
    $IdProducto ="";
    $cantidad = 0;
    $sql = "SELECT cantidad, ID FROM stock where nombre_producto = '$Nombre'";
    $resultado = $conexion->query($sql);

    if($resultado !== false && $resultado->num_rows > 0)
    {
        while($row=$resultado->fetch_assoc())
            {
                $IdProducto = $row["ID"];
                $cantidad = $row["cantidad"];
            }
    }
    $conexion->close();
?>

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

<body>
<?php
        require('Header.php')
    ?>
    <main class="site-main">
        <?php
        echo '
        <div class="fondo">
        <h2 class="centrar-texto fw-400 barra-producto">'.$Nombre.'</h2>
            <div class="contenedor-anuncio-producto contenedor">
                <div class="cantidad-producto">
                    <img src="'.$Imagen.'" alt="Anuncio">
                </div>
                <div class="contenido-anuncio-producto">
                        <div class="fw-700">
                        </div>
                        <div>
                            <p class="fw-700">';
                            if ( $cantidad == 0 )
                            echo 'Agotado';
                            
                            else
                            echo'
                                En stock: '.$cantidad.'
                            </p>
                            <p class="precio">$'.number_format($Precio, 0, '.', ',').'</p>
                            <form action="Producto.php" method="POST">
                                <input type="hidden" value="'.$Nombre.'" name="Producto">
                                <input type="hidden" value="'.$Precio.'" name="Precio">
                                <input type="hidden" value="'.$IdProducto.'" name="IdProducto">
                                <input type="hidden" value="'.$Imagen.'" name="Imagen">
                                <div style="display:flex;">
                                    <INPUT class="spinner" type="NUMBER" min="0" max="'.$cantidad.'" step="1" value="1" size="2" name="Cantidad" required>
                                </div>
                                <input type="submit" class="boton boton-morado boton-producto" value="Agregar Producto">
                            </form>
                        </div>
                </div>
            </div>
        </div>';
        ?>
    </main>

    <?php require('footer.php'); ?>
</body>
</html>