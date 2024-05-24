<?php
//creo la clase departamento
class Departamento{

    // funcion para almacenar un nuevo registro
    public function RegistrarD($NombreDepartamento){

        //incluyo la conexion con la base de dtaos
        include "../conexion.php";

        //realizo Consulta SQL para insertar un nuevo departamento en la base de datos
        $consulta = (" INSERT INTO `departamento` ( `nombre_departamento`) VALUES ('$NombreDepartamento')");

        // Ejecuto la consulta
        $r = mysqli_query($conexion,$consulta);


        // Verifico si la consulta se ejecutó correctamente
        if($r){
             // Redirigir a la página de la tabla de departamentos después del registro exitoso
            header("Location: ../vista/TablaDepartamentos.php");
            echo "registro exitoso";
            // header("Location ../vista/RegistroDepartamanetos.php");
        }
        else {
             // Muestro un mensaje de error y volver al formulario de registro
            include "../vista/RegistroDepartamanetos.php";
            echo "error";
        }

    }

    // funcion para modificar un registro existente
    public function Modificar($id,$nombre){
        include "../conexion.php";

        // Consulta SQL para actualizar el nombre de un departamento en la base de datos
        $Modificar = $conexion->query("UPDATE `departamento` SET `nombre_departamento` = '$nombre' WHERE `departamento`.`id` = '$id;'");
        // Verifico si la consulta se ejecutó correctamente
        if ($Modificar) {
            // Redirijo a la página de la tabla de departamentos después de la modificación exitosa
            header("Location: ../vista/TablaDepartamentos.php");
        }
        else {
            // Mostrar un mensaje de error si algo salió mal
            echo "algo salio mal";
        }
    }

// funcion para eliminar un registro existente
    public function Eliminar($id){
        include "../conexion.php";

        // Consulta SQL para eliminar un registro de la base de datos
        $eliminar = mysqli_query($conexion,"DELETE FROM `departamento` WHERE `departamento`.`id` = '$id'");

        // Verifico si la consulta se ejecutó correctamente
        if ($eliminar) {
            // Redirijo a la página de la tabla de departamentos después de la eliminación exitosa
            header("Location: ../vista/TablaDepartamentos.php");
            // include "../vista/TablaDepartamentos.php";
            echo "registro eliminados correctamente";
        }
        else {
            // Mostro un mensaje de error si algo salió mal
            echo "error";
        }
    }

    // funcion para mostrar la lista de registros de la tabla departamentos
    public function Ver(){
        include "../conexion.php";
        // Consulta SQL para seleccionar todos los datos de la tabla departamentos de la base de datos
        $consulta = mysqli_query($conexion, "SELECT * FROM departamento");
        // una funcion para Contar el número de filas devueltas por la consulta
        $resultado = mysqli_num_rows($consulta);

        // Creo un array para almacenar los datos de la tabla departamentos
        $departamentos = [];
        // Recorro los resultados y almacenarlos en el array
        while ($filas = mysqli_fetch_object($consulta)) {
            $departamentos[] = $filas;
        }
        // retorno el array de departamentos
        return $departamentos;
    }
}




?>