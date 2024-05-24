<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/tabla4.css">
    <title>tabla</title>
</head>
<script>
    function Pregunta(){
        p = confirm("¿etsas seguro que deseas eliminar este registro?");
        return p;
    }
</script>
<body>
    <div class="crud-table">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>modificar/eliminar</th>
                </tr>
            </thead>
            <tbody><?php
                    include "../conexion.php";
                    include "../modelo/ModeloDepartamento.php";

                    $clases = new Departamento();

                    $Departamento = $clases->ver();

                    foreach ($Departamento as $clases) { ?>
                            <tr>
                                <td><?= $clases->id ?></td>
                                <td><?= $clases->nombre_departamento ?></td>
                                <td>
                                    <a class="modificar" href="./ModificarD.php?id=<?=$clases->id ?>">modifcar</a>
                                    
                                    <form action="../controlador/ControladorDepartamento.php?id=<?= $clases->id ?>" method="post">
                                        <input class="eliminar" type="submit" onclick="return Pregunta()" name="eliminar" value="eliminar">
                                    </form>
                                </td>
                            </tr>
                <?php }
                ?>

            </tbody>
        </table>
    </div>
    <div>
        <a href="../../menu.php">inicio</a>
    </div>
</body>

</html>