<?php
// Creo una nueva conexión a la base de datos utilizando la extensión MySQLi
$conexion = new mysqli("localhost", "root", "", "practicas");
// Verifico si hay algún error en la conexión
if ($conexion->connect_error) {
    // Termino la ejecución del script y mostrar un mensaje de error si la conexión falla
    die('Error de conexión: ' . $conexion->connect_error);
}
?>