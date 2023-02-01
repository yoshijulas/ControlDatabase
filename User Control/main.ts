/* eslint-disable no-undef */
$(document).on("DOMContentLoaded", () => {
  $("#crear").on("click", () => {
    const crear = true;
    const correo = $("#correo").val();
    const nombre = $("#nombre").val();
    const telefono = $("#telefono").val();
    const contrasena = $("#contrasena").val();

    if (correo && nombre && telefono && contrasena) {
      $.post(
        "query_pdo.php",
        {
          crear,
          correo,
          nombre,
          telefono,
          contrasena,
        },
        (response) => {
          $("#result").html(response);
        }
      );
    } else {
      $("#result").html("Todos los campos son obligatorios");
    }
    return false;
  });

  $("#restablecer").on("click", () => {
    const restablecer = true;
    const correo = $("#correo").val();
    const contrasena = $("#contrasena").val();

    if (correo && contrasena) {
      $.post(
        "query_pdo.php",
        {
          restablecer,
          correo,
          contrasena,
        },
        (response) => {
          $("#result").html(response);
        }
      );
    } else {
      $("#result").html("<b>Correo</b> y <b>contraseña</b> son obligatorios");
    }
    return false;
  });
});
