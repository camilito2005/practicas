<?php
$conexion = new mysqli("localhost", "root", "", "practicas");
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}
?>