<?php
class Registro
{

    private $conexion;

    //creo un Constructor de la clase
    public function __construct()
    {
           // Establezco conexión con la base de datos al instanciar la clase
        $this->conexion = mysqli_connect("localhost", "root", "", "practicas");
        // Verifico si hay algún error en la conexión
        if ($this->conexion->connect_error) {
            die('Error de conexión: ' . $this->conexion->connect_error);
        }
    }
    //funcion para registrar un nuevo usuario
    public function Registro($id_departamento, $nombre, $apellido, $cedula, $correo, $contraseña)
    {
        // $contrahash = password_hash($contraseña, PASSWORD_DEFAULT);

        // Preparo la consulta SQL con parámetros
        $consulta = $this->conexion->prepare("INSERT INTO personas (id_departamento,nombre,apellidos,cedula,correo,contraseña) VALUE (?,?,?,?,?,?)");
        // Vinculo los parámetros con los valores

        $consulta->bind_param("ississ", $id_departamento, $nombre, $apellido, $cedula, $correo, $contraseña);

        // Redirijo a la página de la tabla de personas después del registro exitoso
        if($consulta->execute()){
            header("Location: ../vista/tablaPersonas.php");
            $consulta->close();
        }
        else {
             // Muestro un mensaje de error si la consulta no se ejecuta correctamente
            include "../vista/tablaPersonas.php";
            $error = "error";
        }
        
        
    }

    // funcion para modificar los datos de un usuario existente
    public function Modificar($id, $nombre, $apellido, $cedula, $correo, $contraseña)
    {
        include "../conexion.php";

        // Actualizo los datos del usuario en la base de datos

        $actualizar = $conexion->query("UPDATE `personas` SET `nombre` = '$nombre', `apellidos` = '$apellido', `cedula` = '$cedula', `correo` = '$correo', `contraseña` = '$contraseña' WHERE `personas`.`id` = $id;");
// Verifico si la actualización se realizó correctamente
        if ($actualizar) {
            header("Location:../vista/tablaPersonas.php");
        } else {
            // Muestro un mensaje de error si algo salió mal
            echo "error";
        }
    }

    // funcion para eliminar un usuario existente
    public function eliminar($id)
    {
        include "../conexion.php";
        // creo la consulta para Eliminar el usuario de la base de datos
        $consulta = mysqli_query($conexion, "DELETE FROM personas WHERE id = $id");
        // Verificar si la eliminación se realizó correctamente
        if ($consulta) {
             // Redirijo a la página de la tabla de personas después de la eliminación exitosa
            header("Location:../vista/tablaPersonas.php");
        } else {
             // Muestro un mensaje de error si algo salió mal
            echo "error";
        }
    }

    // funcion para validar las credenciales de inicio de sesión
    public function Validacion($correo, $contraseña)
    {
        include "../conexion.php";
        //realizo una Consulta a la base de datos para verificar las credenciales
        $ConsultaValidacion = ("SELECT nombre,correo,contraseña FROM personas WHERE correo = '$correo' AND contraseña = '$contraseña'");
    // Ejecuto la consulta
        $resultado = mysqli_query($conexion, $ConsultaValidacion); 

        $validacion = mysqli_fetch_array($resultado);

        // Verifico si las credenciales son válidas
        if (isset($validacion)) {
            // Inicio sesión y redirigijo a la página de menú después de una validación exitosa
            $_SESSION["correo"] = $correo;
            header("Location:../../menu.php");
        } else {
            // Muestro un mensaje de error si las credenciales son incorrectas
            // include "../vista/login.php";
            $error = "credenciales erroneas, por favor intentelo de nuevo";
            require_once('../vista/login.php');
            return;
        }
    }
    // funcion para mostrar los datos de la tabla de personas
    public function mostrar()
    {
        include "../conexion.php";
         // Consulto la base de datos para obtener la lista de personas
        $consulta = mysqli_query($conexion, "SELECT * FROM personas");
// una funcion para Contar el número de filas devueltas por la consulta
        $resultado = mysqli_num_rows($consulta);
         // Creo un array para almacenar los datos de la tabla personass
        $personas = [];
         // Recorro los resultados y almacenarlos en el array
        while ($filas = mysqli_fetch_object($consulta)) {
            $personas[] = $filas;
        }
        return $personas;
        // retorno el array de personas
    }
}
?>