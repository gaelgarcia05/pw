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
    <link rel="stylesheet" href="css/stylePHP.css">
    <link rel="stylesheet" href="css/Productos.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
        require('Header.php')
    ?>

        <main class="contenedor seccion-contacto contenido-centrado">
            <h2 class="fw-400 centrar-texto">Llena el formulario de Contacto</h2>
            
            <form class="contacto" action="">
                <fieldset>
                    <legend>Información Personal</legend>
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombre" placeholder="Tu Nombre">

                    <label for="email">E-mail: </label>
                    <input type="email" id="email" placeholder="Tu Correo electrónico" required>

                    <label for="telefono">Teléfono: </label>
                    <input type="tel" id="telefono" placeholder="Tu teléfono" required>

                    <label for="mensaje">Mensaje: </label>
                    <textarea id="mensaje"></textarea>

                </fieldset>

                <fieldset>
                    <legend>Contacto</legend>

                    <p>Como desea ser contactado: </p>

                    <div class="forma-contacto">
                        <label for="telefono">Teléfono</label>
                        <input type="radio" name="contacto" value="telefono" id="telefono">
                        
                        <label for="correo">E-mail</label>
                        <input type="radio" name="contacto" value="correo" id="correo">
                    </div>

                    <p>Si eligió Teléfono, elija la fecha y la hora</p>
                    <label for="fecha">Fecha: </label>
                    <input type="date" id="fecha">

                    <label for="hora">Hora: </label>
                    <input type="time" id="hora" nub="9:00" max="18:00">
                </fieldset>

                <input type="submit" value="Enviar" class="boton boton-morado">
            </form>
    </main>
    <?php require('footer.php') ?>
</body>


</html>