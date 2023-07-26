$(document).ready(function() {
  $("#selecPM").click(function() {
    event.preventDefault();
    var id = $("#idGradoMateria").val(); // Obtén el valor del campo de selección de materia

    $.ajax({
      url: "../controllers/mtoprof_mat_alum.php",
      type: "POST",
      data: { id : id },
      success: function(response) {
        
        var alumnos = JSON.parse(response); // Parsea la respuesta JSON en un array de alumnos

        // Genera la tabla con los datos de los alumnos
        var table = "<table class='table table-hover'><tr><th scope='col'>#</th><th scope='col'>Nombres</th><th scope='col'>Apellidos</th></tr>";
        for (var i = 0; i < alumnos.length; i++) {
          table += "<tr><td>" + (i + 1) + "</td><td>" + alumnos[i].nombreA + "</td><td>" + alumnos[i].apellidosA + "</td></tr>";
        }
        table += "</table>";

        //alert("hol");
        $("#tablaAlumnos").html(table); // Agrega la tabla al elemento con el ID "alumnosTabla"
        
      },
      error: function(xhr, status, error) {
        alert("Hubo un error en la solicitud AJAX. Por favor, inténtalo de nuevo.");
      }
    });
  });
});
