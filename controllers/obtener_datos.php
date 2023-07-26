<?php
include("conexion.php");
// Obtener el ID del grado y la materia enviados por AJAX
$id = $_POST['gradoMateria'];
$datos = explode("/", $id);
$idMateria = $datos[0];

// Consulta para obtener las actividades relacionadas
$sql = "SELECT id_actividad, nombre_actividad FROM actividad WHERE id_grado_materia = $idMateria";
$result = $conexion->query($sql);

// Construir las opciones del select de actividades
$options = null;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row["id_actividad"] . "'>" . $row["nombre_actividad"] . "</option>";
    }
}

// Enviar las opciones de actividades como respuesta
echo $options;

// Cerrar la conexión
$conexion->close();
?>
