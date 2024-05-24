<?php
class Departamento{
    public function RegistrarD($NombreDepartamento){
        include "../conexion.php";

        $consulta = (" INSERT INTO `departamento` ( `nombre_departamento`) VALUES ('$NombreDepartamento')");

        $r = mysqli_query($conexion,$consulta);


        if($r){
            include "../vista/RegistroDepartamanentos.php";
            echo "registro exitoso";
            // header("Location ../vista/RegistroDepartamanetos.php");
        }
        else {
            include "../vista/RegistroDepartamanetos.php";
            echo "error";
        }

    }

    public function Modificar($id,$nombre){
        include "../conexion.php";
        $Modificar = $conexion->query("UPDATE `departamento` SET `nombre_departamento` = '$nombre' WHERE `departamento`.`id` = '$id;'");
        if ($Modificar) {
            header("Location: ../vista/TablaDepartamentos.php");
        }
        else {
            echo "algo salio mal";
        }
    }

    public function Eliminar($id){
        include "../conexion.php";

        $eliminar = mysqli_query($conexion,"DELETE FROM `departamento` WHERE `departamento`.`id` = '$id'");

        if ($eliminar) {
            header("Location: ../vista/TablaDepartamentos.php");
            // include "../vista/TablaDepartamentos.php";
            echo "registro eliminados correctamente";
        }
        else {
            echo "error";
        }
    }

    public function Ver(){
        include "../conexion.php";
        $consulta = mysqli_query($conexion, "SELECT * FROM departamento");
        $resultado = mysqli_num_rows($consulta);
        $departamentos = [];
        while ($filas = mysqli_fetch_object($consulta)) {
            $departamentos[] = $filas;
        }
        return $departamentos;
    }
}




?>