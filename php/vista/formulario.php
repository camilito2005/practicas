<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/formulario2.css">
    <title>formulario</title>
</head>

<body>
    
    <div class="botones">
        <a class="boton" href="../../menu.php">inicio</a>
    </div>
    <h3 class="formu">formulario de registro</h3>
    <div class="registro">
        <h3>registrate</h3>
        <form action="../controlador/ControladorUsuarios.php" method="post">
            <label class="re" for="">nombre
                <input class="control" placeholder="ingrese su nombre" required type="text" name="nombre">
            </label><br>

            <label for="">departamento
                <select name="departamento" class="control" id="">
                    <?php
                    include "../conexion.php"; // Incluir el archivo de conexión a la base de datos
                    $filas = $conexion->query("SELECT * FROM departamento "); // Ejecutar una consulta SQL para obtener todos los registros de la tabla 'departamento'

                    while ($f = $filas->fetch_object()) { ?>
                        <option value="<?= $f->id ?>"><?= $f->nombre_departamento ?></option>
                    <?php } // Fin del bucle while
                    ?>

                </select>
            </label>
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
            <a class="boton-inicio" href="../vista/login.php">ya tienes cuentas?</a>

        </form>

    </div>

</body>

</html>