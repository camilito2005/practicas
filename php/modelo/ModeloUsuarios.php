<?php
class Registro
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = mysqli_connect("localhost", "root", "", "practicas");
        if ($this->conexion->connect_error) {
            die('Error de conexión: ' . $this->conexion->connect_error);
        }
    }
    public function Registro($id_departamento, $nombre, $apellido, $cedula, $correo, $contraseña)
    {
        // $contrahash = password_hash($contraseña, PASSWORD_DEFAULT);

        $consulta = $this->conexion->prepare("INSERT INTO personas (id_departamento,nombre,apellidos,cedula,correo,contraseña) VALUE (?,?,?,?,?,?)");

        $consulta->bind_param("ississ", $id_departamento, $nombre, $apellido, $cedula, $correo, $contraseña);
        $consulta->execute();
        $consulta->close();
    }

    public function Modificar($id, $nombre, $apellido, $cedula, $correo, $contraseña)
    {
        include "../conexion.php";

        $actualizar = $conexion->query("UPDATE `personas` SET `nombre` = '$nombre', `apellidos` = '$apellido', `cedula` = '$cedula', `correo` = '$correo', `contraseña` = '$contraseña' WHERE `personas`.`id` = $id;");

        if ($actualizar) {
            header("Location:../vista/tablaPersonas.php");
        } else {
            echo "error";
        }
    }

    public function eliminar($id)
    {
        include "../conexion.php";
        $consulta = mysqli_query($conexion, "DELETE FROM personas WHERE id = $id");
        // $resultado = mysqli_num_rows($consulta);
        if ($consulta) {
            header("Location:../vista/tablaPersonas.php");
        } else {
            echo "error";
        }
    }

    public function Validacion($correo, $contraseña)
    {
        include "../conexion.php";
        $ConsultaValidacion = ("SELECT nombre,correo,contraseña FROM personas WHERE correo = '$correo' AND contraseña = '$contraseña'");

        $resultado = mysqli_query($conexion, $ConsultaValidacion);

        $validacion = mysqli_fetch_array($resultado);

        if (isset($validacion)) {
            $_SESSION["correo"] = $correo;
            header("Location:../../menu.php");
        } else {
            include "../vista/login.php";
            echo "credenciales erroneas, por favor intentelo de nuevo";
        }
        // $consulta = $this->conexion->prepare("SELECT nombre,contraseña FROM personas WHERE correo = ?");
        // $consulta->bind_param("s", $correo);
        // $consulta->execute();
        // $consulta->bind_result($nombre,$contrahash);

        // if ($consulta->fetch()) {
        //     if (password_verify($contraseña,$contrahash)) {

        //     }
        //     else {

        //     }
        // }
        // else {

        // }
        // $consulta->close();
    }
    public function mostrar()
    {
        include "../conexion.php";
        $consulta = mysqli_query($conexion, "SELECT * FROM personas");
        $resultado = mysqli_num_rows($consulta);
        $personas = [];
        while ($filas = mysqli_fetch_object($consulta)) {
            $personas[] = $filas;
        }
        return $personas;
    }
}
?>