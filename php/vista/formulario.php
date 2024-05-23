<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/formulario.css">
    <title>formulario</title>
</head>

<body>
    <h3>formulario de registro</h3>
    <div class="registro">
        <h3>registrate</h3>
        <form action="../controlador/ControladorUsuarios.php" method="post">
            <label class="re" for="">nombre
                <input class="control" placeholder="ingrese su nombre" required type="text" name="nombre">
            </label><br>

            <label for="">apellido
                <input class="control" placeholder="ingrese su apellido" required type="text" name="apellido"><br>
            </label>
            <label for="">cedula
                <input class="control" placeholder="ingrese su cedula" required type="text" name="cedula"><br>
            </label>

            <label for="">correo
                <input class="control" placeholder="ingrese su correo" required type="email" name="correo"><br>
            </label>

            <label for="">contraseña
                <input class="control" placeholder="ingrese su contraseña" required type="password" name="contraseña"><br>
            </label>
            <input class="boton" type="submit" value="registrar" name="registrar">
            <a class="boton" href="../vista/login.php">iniciar session</a>
        </form>
    </div>
</body>

</html>