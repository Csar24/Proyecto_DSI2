$(document).ready(function() {
  $("#selecPM").click(function() {
    event.preventDefault();
    var id = $("#idGradoMateria").val(); // Obtén el valor del campo de selección de materia

    $.ajax({
      url: "../controllers/mtoprof_mat_alum.php",
      type: "POST",
      data: { id: id },
      success: function(response) {

        var alumnos = JSON.parse(response); // Parsea la respuesta JSON en un array de alumnos

        // Genera la tabla con los datos de los alumnos//
        var table = "<table class='table table-hover'>";
        table += "<tr>";
        table += "<th scope='col' class='col-md-2'>#</th>";
        table += "<th scope='col' class='col-md-4'>Nombres</th>"
        table += "<th scope='col' class='col-md-4'>Apellidos</th>"; 
        table += "<th scope='col' class='col-md-2'>Nota</th>";
        table += "</tr>";
        for (var i = 0; i < alumnos.length; i++) {
          table += "<tr><td class='col-md-1'>"+ (i + 1) + "<input type='hidden' name='codAlumn[]' value='"+alumnos[i].id_alumno+"'></td><td class='col-md-2'>" +
            alumnos[i].nombreA + "</td><td class='col-md-2'>"+
            alumnos[i].apellidosA + "</td>" +
            "<td class='col-md-4'><input type='number' min='0' max='10' step='0.01' class='form-control' name='nota[]'></td></tr>";
        }
        table += "</table>";//Cerramos la tabla

        // Agrega la tabla al elemento con el ID "tablaAlumnos"
        $("#tablaAlumnos").html(table);

        // Agrega un elemento de entrada de texto al div con el ID "btn"
        var inputElement = "<input type='hidden' name='idGM' value='"+id+"'><input type='submit' class='btn btn-primary me-md-2' value='Guardar'>";
        $("#nuevo").html(inputElement);
      },
      error: function(xhr, status, error) {
        alert("Hubo un error en la solicitud AJAX. Por favor, inténtalo de nuevo.");
      }
    });
  });
});
