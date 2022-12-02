/* eslint-disable no-undef */
$(document).on("DOMContentLoaded", () => {
	$("#anterior").on("click", () => {
		const anterior = true;
		const matricula = $("#matricula").val();

		$.post(
			"query_pdo.php",
			{
				anterior,
				matricula,
			},
			(response) => {
				if (response === "0") {
					$("#result").html("No hay registros anteriores");
				} else {
					const myArray = JSON.parse(response);

					$("#matricula").val(myArray[0]);
					$("#nombre").val(myArray[1]);
					$("#telefono").val(myArray[2]);
					$("#edad").val(myArray[3]);
					$("#result").html("Registro anterior");
				}
			},
		);

		return false;
	});

	$("#crear").on("click", () => {
		const crear = true;
		const matricula = $("#matricula").val();
		const nombre = $("#nombre").val();
		const telefono = $("#telefono").val();
		const edad = $("#edad").val();

		if (matricula === "" || nombre === "" || telefono === "" || edad === "") {
			$("#result").html("Todos los campos son obligatorios");
		} else {
			$.post(
				"query_pdo.php",
				{
					crear,
					matricula,
					nombre,
					telefono,
					edad,
				},
				(response) => {
					$("#result").html(response);
				},
			);
		}
		return false;
	});

	$("#buscar").on("click", () => {
		const buscar = true;
		const matricula = $("#matricula").val();

		if (matricula === "") {
			$("#result").html("Matricula obligatoria");
		} else {
			$.post(
				"query_pdo.php",
				{
					buscar,
					matricula,
				},
				(response: string) => {
					const myArray = JSON.parse(response);

					if (myArray[0] === "") {
						$("#result").html("No hay registros");
					} else {
						$("#matricula").val(myArray[0]);
						$("#nombre").val(myArray[1]);
						$("#telefono").val(myArray[2]);
						$("#edad").val(myArray[3]);

						$("#result").html("Registro encontrado");
					}
				},
			);
		}
		return false;
	});

	$("#eliminar").on("click", () => {
		const eliminar = true;

		const matricula = $("#matricula").val();

		if (matricula === "") {
			$("#result").html("Todos los campos son obligatorios");
		} else {
			$.post(
				"query_pdo.php",
				{
					eliminar,
					matricula,
				},
				(response) => {
					$("#result").html(response);
				},
			);
		}
		return false;
	});

	$("#actualizar").on("click", () => {
		const actualizar = true;
		const matricula = $("#matricula").val();
		const nombre = $("#nombre").val();
		const telefono = $("#telefono").val();
		const edad = $("#edad").val();

		if (matricula === "" || nombre === "" || telefono === "" || edad === "") {
			$("#result").html("Todos los campos son obligatorios");
		} else {
			$.post(
				"query_pdo.php",
				{
					actualizar,
					matricula,
					nombre,
					telefono,
					edad,
				},
				(response) => {
					$("#result").html(response);
				},
			);
		}
		return false;
	});

	$("#siguiente").on("click", () => {
		const siguiente = true;
		const matricula = $("#matricula").val();

		$.post(
			"query_pdo.php",
			{
				siguiente,
				matricula,
			},
			(response) => {
				if (response === "0") {
					$("#result").html("No hay registros siguientes");
				} else {
					const myArray = JSON.parse(response);

					$("#matricula").val(myArray[0]);
					$("#nombre").val(myArray[1]);
					$("#telefono").val(myArray[2]);
					$("#edad").val(myArray[3]);

					$("#result").html("Registro siguiente");
				}
			},
		);

		return false;
	});
});
