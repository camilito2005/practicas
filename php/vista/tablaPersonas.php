<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/tabla4.css">
    <title>Document</title>
</head>

<body>
    <script>
        function pregunta() {
            p = confirm("¿estas seguro que desea eliminar el registro?");
            return p;
        }
    </script>
    <div class="crud-table">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>id_departamento</th>
                    <th>nombre</th>
                    <th>apellido</th>
                    <th>cedula</th>
                    <th>correo</th>
                    <th>contraseña</th>
                    <th>modificar/eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../conexion.php"; // Incluyo el archivo de conexión a la base de datos
                include "../modelo/ModeloUsuarios.php"; // Incluyo el archivo del modelo Departamento
                $funcion = new Registro;  // Creo una instancia de la clase Departamento
                $persona = $funcion->mostrar();// Llamo a la funcion 'mostrar' para obtener la lista de usuarios
                foreach ($persona as $funcion) : ?>
                    <tr>
                        <td><?= $funcion->id ?></td>
                        <td><?= $funcion->id_departamento ?></td>
                        <td><?= $funcion->nombre ?></td>
                        <td><?= $funcion->apellidos ?></td>
                        <td><?= $funcion->cedula ?></td>
                        <td><?= $funcion->correo ?></td>
                        <td><?= $funcion->contraseña ?></td>
                        <td>
                            <button class="modificar">
                                <a href="./ModificarPersonas.php?id=<?= $funcion->id ?>">modificar</a><br>
                            </button>

                            <form action="../controlador/ControladorUsuarios.php?id=<?= $funcion->id ?>" method="post">
                                <input class="eliminar" name="eliminar" type="submit" onclick="return pregunta()" value="eliminar">
                            </form>
                        </td>
                    </tr>

                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <div class="botones">
        <a href="../../menu.php">inicio</a>
    </div>

</body>

</html>