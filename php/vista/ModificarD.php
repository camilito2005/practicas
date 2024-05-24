<?php
include "../conexion.php";
$id = $_GET["id"];
$sql = $conexion->query("SELECT * FROM departamento WHERE id = $id");

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