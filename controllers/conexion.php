<?php
    // Establecer los detalles de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sis_notas";

    // Crear una conexión
    $conexion = mysqli_connect($servername, $username, $password, $dbname);

    // Verificar si la conexión es exitosa
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    //Definimos que se trabajara con caracteres especiales
    $conexion->set_charset("utf8");
?>
