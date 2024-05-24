<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/menu1.css">
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
                    <?php
                    include "./php/conexion.php";
                    $consulta = mysqli_query($conexion, "SELECT * FROM menu");
                    $resultado = mysqli_num_rows($consulta);
                    while ($r = mysqli_fetch_assoc($consulta)) { ?>

                        <li>
                            <a href="<?php echo $r["link"] ?>">
                                <?php echo $r["opciones"] ?>
                            </a>
                        </li>


                    <?php }

                    ?>
                    <!-- <li><a href="../vista/tablaPersonas.php">registros</a></li>
                <li><a href="../vistas/login.php">login</a></li>
                <li><a href="../vista/formulario.php">formulario</a></li> -->
                </ul>
            </nav>
        </header>
        <?php session_start();
    if (isset($_SESSION["correo"])) {
        echo $_SESSION["correo"] . '<form action="./php/controlador/ControladorUsuarios.php" method="post">
        <input type="submit" name="session" value="cerrar session">
    </form>';
    }
    ?>
    </div>
    <script src="./js/script.js"></script>
</body>

</html>