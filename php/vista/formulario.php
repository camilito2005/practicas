<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/formulario1.css">
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

            <label for="">departamento
                <select name="departamento" id="">
                    <?php
                    include "../conexion.php";
                    $filas = $conexion->query("SELECT * FROM departamento ");// SELECT * FROM personas INNER JOIN departamento ON personas.id_departamento = departamento.id_departamento
                    while ($f = $filas->fetch_object()) {?>
                        <option value="<?= $f->id ?>"><?= $f->nombre_departamento ?></option>
                   <?php }
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
    <div class="botones">
        <a href="../../menu.php">inicio</a>
    </div>
</body>

</html>