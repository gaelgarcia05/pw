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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Productos.css">

</head>

<body class="fondo">
<header class="site-header inicio fw-700">
        <div class="contenedor contenido-header">
            <div class="barra">
                <nav id="navegacion" class="navegacion-main alinear-navegador">
                    <div>
                        <a href="index.php" class="logo-header">
                            <img src="img/MercatecLogo.png" alt="Logotipo de la pagina"></img>
                        </a>
                        <a href="Nosotros.php">Conocenos</a>
                        <a href="Productos.php">Catalogo</a>
                        <?php
                        require ('conexion.php');
                        if($VarSession == NULL || $VarSession = '')
                        {
                            echo '<a href="Login.html">Inicia Sesion</a>';
                        }
                        else
                        {
                            echo '
                            <a href="CerrarSesion.php">Cerrar Sesion</a>
                        ';
                        }
                        ?>
                    </div>
                    <div class="alinear agrupar">
                        <div>
                        <a href="Admin.php">Administrador</div></a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main class="site-main-carrito contenedor">
        <div class="space-between">
            <div class="lista-productos-carrito">
                <h1>Stock de Administrador</h1>
                <hr class="hr-carrito">
                <?php                    
                    $ArregloPrecio = array();
                    $ArregloCantidad = array();
                    $ArregloImagen = array();
                    $ArregloNombreProducto = array();
                    $Total = 0;
                    $ArregloID_Producto = array();

                    $sql = "SELECT * FROM stock";
                    $resultado = $conexion->query($sql);
                    

                    if($resultado->num_rows > 0)
                    {
                        while($row=$resultado->fetch_assoc())
                        {
                            array_push ($ArregloID_Producto, $row["ID"]);
                            array_push ($ArregloImagen, $row["imagen"]);
                            array_push ($ArregloNombreProducto, $row["nombre_producto"]);
                            array_push ($ArregloCantidad, $row["cantidad"]);
                            array_push ($ArregloPrecio, $row["precio"]*$row["cantidad"]);
                        }   
                    }
                    else
                    {
                        echo '<h4 class="sin-productos">Carrito sin Productos</h4>';
                    }
                    $conexion->close();
                    $cantidadTotal = 0;
                    $i=0;
                    while ($i < count ($ArregloID_Producto))
                    {
                            $cantidadTotal += $ArregloCantidad[$i];
                            $Total += $ArregloPrecio[$i];
                        echo '
                            <div class="contenedor-productos-carrito">
                                <img src="'.$ArregloImagen[$i].'">
                                <div class="contenedor-descripcion-producto">
                                    <p>'.$ArregloNombreProducto[$i].'</p>
                                    <p>Cantidad: '.$ArregloCantidad[$i].'</p>
                                    <p>Total: $'.number_format($ArregloPrecio[$i], 0, '.', ',').'</p>
                                </div> 
                            </div>
                            <hr class="hr-carrito">';

                        $i++;
                    }
                ?>
            </div>
            <div>
                <div class="subtotal">
                    <h4>Total en Stock</h4>
                    <?php
                        echo '<p class="precio">$'.number_format($Total, 0, '.', ',').'</p>';
                        echo '<p class="precio">Cantidad: '.$cantidadTotal.'</p>';
                    ?>
                </div>
            </div>
        </div>
    </main>

    <?php require('footer.php') ?>
</body>
</html>