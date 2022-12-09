<?php
    require ('conexion.php');

    if($VarSession == NULL || $VarSession = ''){
        echo "<script> alert('Usted no tiene una cuenta');
        window.location ='Login.html';</script>";
        die();
    }
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
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/Productos.css">
    </head>    
    
<body>
    <?php
        require('Header.php');
    ?>

    <main class="site-main-carrito contenedor">
        <div class="space-between">
            <div class="lista-productos-carrito">
                <h1>Carrito de compra</h1>
                <hr class="hr-carrito">
                <?php
                    $ArregloPrecio = array();
                    $ArregloCantidad = array();
                    $ArregloNombre = array();
                    $ArregloImagenes = array();
                    $Total = 0;
                    $ArregloID_Producto = array();
                    
                    $usuario = $_SESSION['User'];

                    $sql = "SELECT * FROM pedido where Usuario = '$usuario'";
                    $resultado = $conexion->query($sql);
                    

                    if($resultado->num_rows > 0)
                    {
                        while($row=$resultado->fetch_assoc())
                        {
                            array_push ($ArregloID_Producto, $row["ID_producto"]);
                            array_push ($ArregloNombre, $row["Nombre"]);
                            array_push ($ArregloImagenes, $row["imagen"]);
                            array_push ($ArregloCantidad, $row["Cantidad"]);
                            array_push ($ArregloPrecio, $row["Total"]);
                            
                        }   
                    }
                    else
                    {
                        echo '<h4 class="sin-productos">Carrito sin Productos</h4>';
                    }
                    $conexion->close();
                    $i=0;
                    while ($i < count ($ArregloID_Producto))
                    {
                            $Total += $ArregloPrecio[$i];
                        echo '
                            <div class="contenedor-productos-carrito">
                                <img src="'.$ArregloImagenes[$i].'">
                                <div class="contenedor-descripcion-producto">
                                    <p>'.$ArregloNombre[$i].'</p>
                                    <p>Cantidad: '.$ArregloCantidad[$i].'</p>
                                    <p>Total: $'.number_format($ArregloPrecio[$i], 0, '.', ',').'</p>
                                </div> 
                            </div>
                            <div class="alinear-boton-eliminar">
                            <form action="eliminar.php" method="POST">
                                <input type="hidden" value="'.$ArregloID_Producto[$i].'" name="ProductoaEliminar">
                                <input class="boton boton-morado boton-eliminar" type="submit" value="Eliminar">
                            </form>
                            </div><hr class="hr-carrito">';
                        $i++;
                    }
                ?>
            </div>
            <div>
                <div class="subtotal">
                    <h4>Subtotal</h4>
                    <?php
                        echo '<p class="precio">$'.number_format($Total, 0, '.', ',').'</p>';
                    ?>
                </div>
                <div class="pagar">
                    <h4>Proceder al Pago</h4>
                    <a href ="Pagar.php" class="boton boton-pastel boton-producto">Método de pago</a>
                    <a href="ticket.php" class="boton boton-pastel">Generar ticket de compra</a>
                </div>
            </div>
        </div>
    </main>

    <?php require('footer.php') ?>
</body>
</html>