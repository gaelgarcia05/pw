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
    <link rel="stylesheet" href="css/stylePHP.css">
</head>

<body>
<?php
        require('Header.php')
    ?>

    <main class="site-main">
        <div class="fondo">
            <div class="contenedor-anuncio-producto contenedor">
                <div class="cantidad-producto">
                    <?php
                       require ('conexion.php');

                        $Nombres = $_POST['Nombre'];
                        $Apellidos = $_POST['Apellidos'];
                        $Email = $_POST['Correo'];
                        $Telefono = $_POST['Telefono'];
                        $usua = $_POST['NomUsuario'];
                        $Contraseña = $_POST['Contraseña'];

                        //$Registrado = "SELECT * FROM inicio WHERE usuario = '" .$Nombre. "' AND Contraseña = '".$Contraseña."'";
                        $Nuevo = "INSERT INTO registros(Nombres,Apellidos,Email,Telefono,ID_Registro,Usuario,Contraseña) 
                                    VALUES ('$Nombres','$Apellidos','$Email',$Telefono,NULL,'$usua','$Contraseña')";

                        $query = mysqli_query($conexion, $Nuevo);
                        if (isset($usua))
                        {
                            if (!$query) {
                                echo '<script>
                                alert("Usuario ya existente, ingrese con un correo y usuario distinto");
                            </script>
                            <div style= "display:flex; align-items: center; flex-direction: column">
                                <h1>Error, verifica bien los datos ingresados</h1>
                                <img src="img/Cheems.jpg" alt = "Cheems">
                            
                            <a href="Registro.html" class="boton boton-morado"> Volver </a>
                            </div>
                            ';
                            } else {
                                
                                echo '
                                <div style= "display:flex; align-items: center; flex-direction: column">
                                    <h1>Usuario Registrado correctamente</h1>
                                    <img src="img/doge.png" alt = "Doge">
                                    <a href="Login.html" class="boton boton-morado"> Volver </a>
                                </div>';
                            }
                            mysqli_close($conexion);
                        }
                        else{
                            echo "<script>
                                alert('Ingrese un correo');
                            </script>
                            <a href='Registro.html' class='boton boton-azul'> Volver </a>";
                        }

                    ?>
                </div>
            </div>
        </div>
    </main>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <div class="agrupar">
                <nav class="navegacion">
                    <a href="Nosotros.php">Conocenos</a>
                    <a href="Productos.php">Catalogo</a>
                    <a href="Vision.php">Vision</a>
                    <a href="Contacto.php">Contacto</a>
                </nav>
                <p class="copyright">ALGAR &copy;
                </p>
            </div>
            <div class="agrupar fw-400">
                <p>Torreón, Coahuila México</p>
                <p>Algar- MercaTec</p>
                <p>tel: 8713351802</p>
            </div>
        </div>
    </footer>
</body>

</html>