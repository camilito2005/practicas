<?php
require_once "../modelo/ModeloUsuarios.php";
$funcion = new Registro;

if (isset($_POST["registrar"])) {
    $id_departamento = $_POST["departamento"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];



    if ($funcion->Registro($id_departamento, $nombre, $apellido, $cedula, $correo, $contraseña)) {
        include "../vista/formulario.php";
        echo "todo bien";
    } else {
        include "../vista/formulario.php";
        echo "todo mal";
    }
}

if (isset($_POST["modificar"])) {

    
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    $funcion->Modificar($id, $nombre, $apellido, $cedula, $correo, $contraseña);
}

if (isset($_REQUEST["eliminar"])) {
    if (isset($_REQUEST["id"])) {
        $id = $_REQUEST["id"];
        $funcion->eliminar($id);
    }
}

if (isset($_POST["login"])) {
    session_start();
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    $funcion->Validacion($correo, $contraseña);
}


if (isset($_POST["session"])) {
    session_start();
    session_destroy();
    header("Location:../vista/login.php");
}
?>
