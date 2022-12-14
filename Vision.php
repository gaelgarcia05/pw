<?php
    require ('conexion.php');
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylePHP.css">
    <link rel="stylesheet" href="css/Productos.css">

</head>

<body>
    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <div>
                    <a href="index.php">
                        <img src="img/Logo.svg" alt="Logotipo de la pagina">
                    </a>
                </div>
                <nav id="navegacion" class="navegacion alinear-navegador">
                    <div>
                        <a href="Nosotros.php">Conocenos</a>
                        <a href="Productos.php">Catalogo</a>
                        <a href="Vision.php">Vision</a>
                        <a href="Contacto.php">Contacto</a>
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
                        <a href="Carrito.php">Carrito de compra</div><div><img class ="carrito"src="img/carrito.png" alt="Carrito de Compra"></div></a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main class="contenedor espacio">
        <h2 class="centrar-texto fw-400">Nuestra empresa</h2>
        <div class="contenedor-blog">
            <div class="entrada">
                <img src="img/vision.png" alt="">
                <div>
                    <h3>Visi??n</h3>
                    <p>ALGAR es una empresa de innovaci??n en ropa y accesorios, accesible a cualquier bolsillo, mejorar la vida de nuestros clientes, empleados y comunidad, as?? como inspirar a otros a hacerlo tambi??n.</p>
                </div>
            </div>
            <div class="entrada">
                <img src="img/estrategia.png" alt="">
                <div>
                    <h3>Estrategia</h3>
                    <p>La inversi??n en medios es una pieza clave dentro del ecommerce dado que es a trav??s de ellos que las personas tienen la posibilidad de descubrir que tu negocio existe.</p>
                </div>
            </div>
            <div class="entrada">
                <img src="img/mision.png" alt="">
                <div>
                    <h3>Misi??n</h3>
                    <p>Ofrecer a nuestros clientes productos de calidad, a precios c??modos que cumplan con sus necesidades y exigencias, abarcando sus gustos de acuerdo a su estilo de ver y vivir la vida.</p>
                </div>
            </div>
        </div>
    </main>

    <?php require('footer.php') ?>
</body>


</html>