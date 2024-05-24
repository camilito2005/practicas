<?php
// Incluyo el archivo que contiene la definición de la clase Registro
require_once "../modelo/ModeloUsuarios.php";
// Creo una instancia de la clase Registro
$funcion = new Registro;

//  si se ha enviado el formulario de registro
if (isset($_POST["registrar"])) {
    // Obtengo los datos del formulario de registro
    $id_departamento = $_POST["departamento"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];


    //Llamo a la funcion Registro para registrar el nuevo usuario
    $funcion->Registro($id_departamento, $nombre, $apellido, $cedula, $correo, $contraseña);

}

//si se ha enviado el formulario de modificación
if (isset($_POST["modificar"])) {

    // Obtengo los datos del formulario de modificación
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    // Llamo a la funcion Modificar para actualizar el usuario
    $funcion->Modificar($id, $nombre, $apellido, $cedula, $correo, $contraseña);
}

//si se ha enviado la solicitud de eliminación
if (isset($_REQUEST["eliminar"])) {
     // Verifico si se mando el ID del usuario a eliminar
    if (isset($_REQUEST["id"])) {
        // Obtengo el ID del usuario a eliminar
        $id = $_REQUEST["id"];
        // Llamo a la funcion eliminar para eliminar el usuario
        $funcion->eliminar($id);
    }
}
//si se ha enviado el formulario de inicio de sesión
if (isset($_POST["login"])) {
    session_start();
    // Obtengo los datos del formulario de inicio de sesión
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

     // Llamo a la funcion Validacion para validar las credenciales de inicio de sesión
    $funcion->Validacion($correo, $contraseña);
}

// si se ha enviado el formulario de cierre de sesión
if (isset($_POST["session"])) {
    session_start();//
    session_destroy();//
    header("Location:../vista/login.php");// lo redirigo a el login
}
?>
