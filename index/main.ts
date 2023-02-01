// jquery on page load
$(document).on("DOMContentLoaded", () => {
  $("#login").on("click", () => {
    const login = true;
    const usuario = $("#usuario").val();
    const password = $("#password").val();
    if (usuario && password) {
      $.post(
        "query_pdo.php",
        {
          login,
          usuario,
          password,
        },
        (response) => {
          if (response === "2") {
            location.href = "../User Control/index.php";
          } else if (response === "1") {
            location.href = "../Admin Control/index.php";
          } else {
            $("#result").html(response);
          }
        }
      );
    } else {
      $("#result").html("Todos los campos son obligatorios");
    }
    return false;
  });
});
