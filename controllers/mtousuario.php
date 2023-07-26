<?php 
	include("conexion.php");
	// Obtener el ID del registro a eliminar
	$id = $_POST['id'];
	$fx = $_POST['fx'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$usuario = $_POST['usuario'];
	$contrasenia = $_POST['contra'];
	$idacceso = $_POST['tp'];

	if($fx == "eliminar"){
		// Consulta para eliminar el registro
		$query = "DELETE FROM usuario WHERE id_usuario = $id";
		mysqli_query($conexion, $query);
	}
	else if($fx == "guardar") {
		if(isset($nombre) && !empty($nombre))
		{
			$query = "INSERT INTO usuario(id_tipo_acceso,nombre,apellidos,usuario,contra) VALUES('$idacceso','$nombre','$apellidos','$usuario','$contrasenia')";
			mysqli_query($conexion, $query);
		}
	}
?>