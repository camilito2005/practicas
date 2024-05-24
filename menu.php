<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/menu2.css">
    <title>menu</title>
</head>

<body>

    <a href=""></a>
    <div>
        <header>
            <nav>
                <div class="menu-toggle" id="menu-toggle">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <ul class="nav-links" id="nav-links">
                    <?php session_start();
                    if (isset($_SESSION["correo"])) {
                        echo $_SESSION["correo"] . '<form action="./php/controlador/ControladorUsuarios.php" method="post">
        <input type="submit" name="session" class="eliminar" value="cerrar session">
    </form>';
                    }
                    ?>
                    <?php
                    include "./php/conexion.php"; // Incluyo el archivo de conexión a la base de datos
                    $consulta = mysqli_query($conexion, "SELECT * FROM menu"); // Ejecuto una consulta SQL para obtener todos los registros de la tabla 'menu'
                    $resultado = mysqli_num_rows($consulta); // Obtengo el número de filas devueltas por la consulta
                    while ($r = mysqli_fetch_assoc($consulta)) { 
                    if (isset($_SESSION["correo"])) {
                            if ($r["opciones"] != "inicia sesion") {
                    ?>
                                <li>
                                    <a href="<?php echo $r["link"] ?>">
                                        <?php echo $r["opciones"] ?>
                                    </a>
                                </li>
                            <?php }
                        } else { ?>
                            <li>
                                <a href="<?php echo $r["link"] ?>">
                                    <?php echo $r["opciones"] ?>
                                </a>
                            </li>
                        <?php }
                        ?>


                    <?php }

                    ?>
                    <!-- <li><a href="../vista/tablaPersonas.php">registros</a></li>
                <li><a href="../vistas/login.php">login</a></li>
                <li><a href="../vista/formulario.php">formulario</a></li> -->
                </ul>
            </nav>
        </header>

    </div>
    <script src="./js/script.js"></script>
</body>

</html>