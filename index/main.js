// jquery on page load
$(document).on("DOMContentLoaded", () => {
	$("#login").on("click", () => {
		let login = true;
		let usuario = $("#usuario").val();
		let password = $("#password").val();

		if (usuario === "" || password === "") {
			$("#result").html("Todos los campos son obligatorios");
		} else {
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
				},
			);
		}
		return false;
	});
});
