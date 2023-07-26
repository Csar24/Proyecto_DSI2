<?php
require('fpdf.php');
include("../controllers/conexion.php");

$sql = null;

if(isset($_POST['asistenciaR'])){
    $id = $_POST['asistenciaR'];
    $sql = "SELECT da.estado, COUNT(da.estado) AS cantidad, u.nombre, u.apellidos FROM detalle_asistencia da, alumno_grado ag, usuario u, grado_materia gm, asistencia a WHERE da.id_alumno = ag.id_alumno AND ag.id_usuario = u.id_usuario AND a.id_asistencia = da.id_asistencia AND gm.id_grado_materia = $id AND (da.estado = 'A' OR da.estado = 'P') GROUP BY da.estado";
}else{
    $idMateria = $_POST['materia'];
    $idGrado = $_POST['grado'];
    // Consulta SQL
    $sql = "SELECT da.estado, COUNT(da.estado) AS cantidad, u.nombre, u.apellidos
        FROM detalle_asistencia da
        INNER JOIN alumno_grado ag ON da.id_alumno = ag.id_alumno
        INNER JOIN usuario u ON ag.id_usuario = u.id_usuario
        INNER JOIN grado_materia gm ON ag.id_grado = gm.id_grado
        INNER JOIN materia m ON gm.id_materia = m.id_materia
        WHERE gm.id_grado = $idGrado AND m.id_materia = $idMateria
        AND (da.estado = 'A' OR da.estado = 'P')
        GROUP BY da.estado";
}

$result = $conexion->query($sql);

// Crear el archivo PDF usando FPDF
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Informe de Asistencia', 0, 1, 'C');
$pdf->Ln(10);
$pdf->Cell(20, 10, '#');
$pdf->Cell(40, 10, 'Nombre');
$pdf->Cell(40, 10, 'Apellidos');
$pdf->Cell(30, 10, 'Estado');
$pdf->Cell(30, 10, 'Cantidad');
$pdf->Ln();
$i = 1;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 10, $i);
        $pdf->Cell(40, 10, $row['nombre']);
        $pdf->Cell(40, 10, $row['apellidos']);
        if($row['estado']=="A")
            $pdf->Cell(30, 10, "Ausente");
        else if($row['estado']=="P")
            $pdf->Cell(30, 10, "Presente");
        $pdf->Cell(30, 10, $row['cantidad']);
        $pdf->Ln();
        $i++;
    }
} else {
    $pdf->Cell(0, 10, 'No se encontraron resultados.', 0, 1);
}

// Salida del archivo PDF
$pdf->Output();

// Cerrar la conexión a la base de datos
$conexion->close();
?>