<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/formulario1.css">
    <title>Departamento</title>
</head>

<body>
    <div class="registro">
        <form action="../controlador/ControladorDepartamento.php" method="post">
            <label class="re" for="">departamento
                <input placeholder="ingrese el nombre del departamento" class="control" type="text" name="nombre">
            </label>
            <input class="boton" type="submit" value="registrar" name="registrar">
        </form>
    </div>

    <div class="botones">
        <a href="../../menu.php">inicio</a>
    </div>
</body>

</html>