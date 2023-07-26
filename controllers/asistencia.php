<?php
	include("conexion.php");

	$idProfesor = $_POST['idProfesor'];
	$idGM = $_POST['idGM'];
	$datos = explode("/", $idGM);
	$idGradoMat = $datos[0];
	$idAlumno = $_REQUEST['codAlumn'];	
	$estado = $_REQUEST['estAsis'];
	$comentario = $_REQUEST['obser'];
	$fechaA = new DateTime($_POST['fechaA']);//Convertimos la fecha para almacenar
	$valor = "Error";
	$dt = $fechaA->format('Y-m-d'); //Formateamos la hora

	try {

		$sql = "INSERT INTO asistencia(id_profesor,id_grado_materia,fecha) VALUES('$idProfesor','$idGradoMat','$dt')";
		if(mysqli_query($conexion, $sql))
		{
			$idAsistencia = mysqli_insert_id($conexion);
			for ($i=0; $i < count($idAlumno); $i++){
				$cons = "INSERT INTO detalle_asistencia VALUES('$idAsistencia','$idAlumno[$i]','$estado[$i]','$comentario[$i]')";
				echo $cons;
				mysqli_query($conexion, $cons);
			}
			$valor = "Exito";
		}
	} catch (Exception $e) {
		echo $e;
	}
	header('Location: ../teacher/asistencia.php?estado='.$valor);
?>