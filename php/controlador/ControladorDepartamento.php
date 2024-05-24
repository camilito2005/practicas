<?php
// Incluyo el archivo que contiene la definición de la clase Departamento
require_once "../modelo/ModeloDepartamento.php";

// Creo una instancia de la clase Departamento
$clase = new Departamento();

// si se ha enviado el formulario de registro
if (isset($_POST["registrar"])) {

    // Obtengo el los datos del del formulario
    $NombreDepartamento = $_POST["nombre"];

    // Llamo a la funcion RegistrarD para realizar el registro
    $clase->RegistrarD($NombreDepartamento);
}
//si se ha enviado el formulario de modificación
if (isset($_POST["modificar"])) {
    // Obtengo los datos del formulario
    $id = $_REQUEST["id"];
    $Nombre =$_POST["nombre"];

     // Llamo a la funcion Modificar para realizar la Modificacion
    $clase->Modificar($id,$Nombre);
}

//si se ha enviado la solicitud de eliminación
if (isset($_REQUEST["eliminar"])) {
    // Verifico si se mando el ID del departamento a eliminar
    if (isset($_REQUEST["id"])) {
        // Obtengo el ID del departamento a eliminar
        $id = $_REQUEST["id"];

        //Llamo a la funcion Eliminar para eliminar el departamento
        $clase->Eliminar($id);
    }
}
?>