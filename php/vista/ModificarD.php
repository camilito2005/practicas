<?php
include "../conexion.php"; // incluyo la conexion de la base de datos
$id = $_GET["id"];// Obtengo el parámetro 'id' de la URL y lo guardo en una variable "$id"
$sql = $conexion->query("SELECT * FROM departamento WHERE id = $id"); // realizo la consulta para seleccionar todos los datos de la tabla "departameto"

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
        <form action="../controlador/ControladorDepartamento.php" method="post">
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            while ($f = $sql->fetch_object()) { ?>
                <label for=""> nombre
                    <input name="nombre" value="<?= $f->nombre_departamento ?>" type="text">
                </label>
                <input type="submit" class="button" value="modificar" name="modificar">

            <?php }
            ?>
        </form>
    </div>
</body>

</html>