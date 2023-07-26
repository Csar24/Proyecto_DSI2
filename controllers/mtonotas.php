<?php
	include("conexion.php");

	$idActividad = $_POST['idPerfil'];
	$fechaA = new DateTime($_POST['fechaA']);//Convertimos la fecha para almacenar
	$dt = $fechaA->format('Y-m-d'); //Formateamos la hora

	$idGM = $_POST['idGM'];
	$datos = explode("/", $idGM);	
	$idGradoMat = $datos[0];
	$idAlumno = $_REQUEST['codAlumn'];	
	$nota = $_REQUEST['nota'];
	
	$valor = "Error";
	

	try {

		$sql = "INSERT INTO nota(id_actividad,fecha) VALUES('$idActividad','$dt')";
		if(mysqli_query($conexion, $sql))
		{
			$idNota = mysqli_insert_id($conexion);
			for ($i=0; $i < count($idAlumno); $i++){
				$cons = "INSERT INTO detalle_nota VALUES('$idNota','$idAlumno[$i]','$nota[$i]')";
				echo $cons;
				mysqli_query($conexion, $cons);
			}
			$valor = "Exito";
		}
	} catch (Exception $e) {
		echo $e;
	}
	header('Location: ../teacher/notas.php?estado='.$valor);
?>