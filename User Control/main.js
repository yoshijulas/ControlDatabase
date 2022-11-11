/* eslint-disable no-undef */
$(document).on('DOMContentLoaded', () => {
  $('#crear').on('click', () => {
    const crear = true;
    const matricula = $('#matricula').val();
    const nombre = $('#nombre').val();
    const telefono = $('#telefono').val();
    const edad = $('#edad').val();

    if (matricula === '' || nombre === '' || telefono === '' || edad === '') {
      $('#result').html('Todos los campos son obligatorios');
    } else {
      $.post(
        'query_pdo.php',
        {
          crear,
          matricula,
          nombre,
          telefono,
          edad,
        },
        (response) => {
          $('#result').html(response);
        },
      );
    }
    return false;
  });
});
