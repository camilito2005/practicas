<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/login3.css">
    <title>login</title>
</head>

<body>
    <!-- <p>inicia session</p> -->
    <?php
    if (isset($_SESSION["nombre"])) {
        $_SESSION["nombre"];
    }
    ?>
    
    <div class="inicio">
        <p>inicia session</p>
        <form class="login-form" action="../controlador/ControladorUsuarios.php" method="post">
            <label for="">correo
                <input class="control1" placeholder="ingrese su correo" required type="email" name="correo">
            </label><br><br>
            <label for="">contraseña
                <input class="control1" placeholder="ingrese su contraseña" required type="password" name="contraseña">
            </label><br><br>

            <div class="botones">
                <input class="boton1" type="submit" value="iniciar sesion" name="login">
                <a class="boton" href="./formulario.php">registrate</a>
            </div>


        </form>
    </div>
    <a href="../../menu.php">inicio</a>
</body>

</html>