<?php
include "../conexion.php";
$id = $_GET["id"];
$consulta = $conexion->query("SELECT * FROM personas WHERE id = $id");
$depar = $conexion->query("SELECT* FROM departamento");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/modificar1.css">
    <title>modificar</title>
</head>

<body>
    <div class="contenedor">

        <form action="../controlador/ControladorUsuarios.php" method="post">
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            
            while ($filas = $consulta->fetch_object()) {?>
               
<!-- <label for="">
    <input type="text" disabled value=">">
</label> -->
                </label><br>
                <label for="">nombre
                    <input type="text" value="<?= $filas->nombre ?>" name="nombre">
                </label><br>



                <label for="">apellidos
                    <input type="text" value="<?= $filas->apellidos ?>" name="apellido">
                </label><br>

                <label for=""> cedula
                    <input type="text" value="<?= $filas->cedula ?>" name="cedula">
                </label><br>

                <label for="">correo
                    <input type="email" value="<?= $filas->correo ?>" name="correo">
                </label><br>

                <label for="">contraseña
                    <input type="text" value="<?= $filas->contraseña ?>" name="contraseña">
                </label><br>


                <input type="submit" class="button" value="modificar" name="modificar">
            <?php }
            ?>
        </form>
    </div>
</body>

</html>