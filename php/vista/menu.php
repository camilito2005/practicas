<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
</head>

<body>
    <?php session_start();
    if (isset($_SESSION["correo"])) {
        echo $_SESSION["correo"] . '<form action="../controlador/ControladorUsuarios.php" method="post">
        <input type="submit" name="session" value="cerrar session">
    </form>';
    }
    ?>
    <div>

        <nav>
            <ul></ul>
        </nav>
    </div>
</body>

</html>