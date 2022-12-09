<?php
    require ('conexion.php');
    $ID= $_POST['ID'];
    $Nombre_Producto = "";
    $Precio = 0;
    $Cantidad = 0;
    $Descripcion = "";
    $Imagen = "";
    $IDProveedor = NULL;

    $sql = "SELECT * FROM stock where ID = '$ID'";
    $resultado = $conexion->query($sql);
    if($resultado->num_rows > 0)
    {
        while($row=$resultado->fetch_assoc())
            {
            $Nombre_Producto = $row["nombre_producto"];
            $Precio = $row["precio"];
            $Cantidad = $row["cantidad"];
            $Imagen = $row["imagen"];
            $IDProveedor = $row["Proveedor"];
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
</head>

<body>

    <?php
    echo'
    <form action="Guardar.php" method="POST">
            <div>
            <label for="ID">ID</label>
            <input type="number" name="ID" placeholder="Ingrese el valor" value="'.$ID.'" max=9999 min=1000>
            <input type="hidden" name="ID_Original"  value="'.$ID.'">
            <p>
            </div>

            <div>
            <label for="Proveedor">Id del proveedor</label>
            <input type="text" name="Proveedor" readonly="readonly" value="'.$IDProveedor.'" >
            </div>

            <div>
            <label for="Nombre_Producto">Nombre del Producto</label>
            <input type="text" name="Nombre" placeholder="Ingrese el valor" value="'.$Nombre_Producto.'">
            <p>
            </div>

            <div>
            <label for="Precio">Precio</label>
            <input type="number" name="Precio" placeholder="Ingrese el valor" value="'.$Precio.'">
            <p>
            </div>

            <div>
            <label for="Descripcion">Cantidad</label>
            <input type="number" name="Cantidad" placeholder="Ingrese el valor" value="'.$Cantidad.'" max=100 min=0>
            <p>
            </div>

           

            <div>
            <label for="Imagen">url imagen</label>
            <input type="text" name="Imagen" placeholder="Ingrese el valor" value="'.$Imagen.'">
            <p>
            </div>

           

            
            </div>';
            ?>
            <div>
            <input type="reset" value="Restablecer">
            <input type="submit" name="Guardar" value="Guardar cambios">
            
            <p>
            </div>
    </form>
   
    <form action="EliminarProducto.php" method="POST">
        <?php echo'
        <input type="hidden" name="ID" value="'.$ID.'">';
        ?>
        <input type="submit" name="Eliminar" value="Eliminar producto">
    </form>
</body>

</html>
<?php
?>