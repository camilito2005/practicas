<?php
require_once "../modelo/ModeloDepartamento.php";

$clase = new Departamento();

if (isset($_POST["registrar"])) {

    $NombreDepartamento = $_POST["nombre"];

    $clase->RegistrarD($NombreDepartamento);
}
if (isset($_POST["modificar"])) {
    $id = $_REQUEST["id"];
    $Nombre =$_POST["nombre"];

    $clase->Modificar($id,$Nombre);
}

if (isset($_REQUEST["eliminar"])) {
    if (isset($_REQUEST["id"])) {
        $id = $_REQUEST["id"];

        $clase->Eliminar($id);
    }
}
?>