/* eslint-disable no-undef */
$(document).on("DOMContentLoaded", () => {
	$("#anterior").on("click", () => {
		const anterior = true;
		const idLibro = $("#idLibro").val();

		$.post(
			"query_pdo.php",
			{
				anterior,
				idLibro,
			},
			(response) => {
				if (response === "0") {
					$("#result").html("No hay registros anteriores");
				} else {
					const myArray = JSON.parse(response);

					$("#idLibro").val(myArray[0]);
					$("#nombre-libro").val(myArray[1]);
					$("#autor").val(myArray[2]);
					$("#anno").val(myArray[3]);
					$("#editorial").val(myArray[4]);
					$("#result").html("Registro anterior");
				}
			},
		);

		return false;
	});

	$("#anadir").on("click", () => {
		const crear = true;
		const idLibro = $("#idLibro").val();
		const nombre = $("#nombre-libro").val();
		const autor = $("#autor").val();
		const anno = $("#anno").val();
		const editorial = $("#editorial").val();

		if (
			idLibro === "" ||
			nombre === "" ||
			autor === "" ||
			anno === "" ||
			editorial === ""
		) {
			$("#result").html("Todos los campos son obligatorios");
		} else {
			$.post(
				"query_pdo.php",
				{
					crear,
					idLibro,
					nombre,
					autor,
					anno,
					editorial,
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
		const idLibro = $("#idLibro").val();

		if (idLibro === "") {
			$("#result").html("idLibro obligatoria");
		} else {
			$.post(
				"query_pdo.php",
				{
					buscar,
					idLibro,
				},
				(response) => {
					const myArray = JSON.parse(response);

					if (myArray[0] === "") {
						$("#result").html("No hay registros");
					} else {
						$("#idLibro").val(myArray[0]);
						$("#nombre-libro").val(myArray[1]);
						$("#autor").val(myArray[2]);
						$("#anno").val(myArray[3]);
						$("#editorial").val(myArray[4]);

						$("#result").html("Registro encontrado");
					}
				},
			);
		}
		return false;
	});

	$("#eliminar").on("click", () => {
		const eliminar = true;

		const idLibro = $("#idLibro").val();

		if (idLibro === "") {
			$("#result").html("Todos los campos son obligatorios");
		} else {
			$.post(
				"query_pdo.php",
				{
					eliminar,
					idLibro,
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
		const idLibro = $("#idLibro").val();
		const nombre = $("#nombre-libro").val();
		const autor = $("#autor").val();
		const anno = $("#anno").val();
		const editorial = $("#editorial").val();

		if (
			idLibro === "" ||
			nombre === "" ||
			autor === "" ||
			anno === "" ||
			editorial === ""
		) {
			$("#result").html("Todos los campos son obligatorios");
		} else {
			$.post(
				"query_pdo.php",
				{
					actualizar,
					idLibro,
					nombre,
					autor,
					anno,
					editorial,
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
		const idLibro = $("#idLibro").val();

		$.post(
			"query_pdo.php",
			{
				siguiente,
				idLibro,
			},
			(response) => {
				if (response === "0") {
					$("#result").html("No hay registros siguientes");
				} else {
					const myArray = JSON.parse(response);

					$("#idLibro").val(myArray[0]);
					$("#nombre-libro").val(myArray[1]);
					$("#autor").val(myArray[2]);
					$("#anno").val(myArray[3]);
					$("#editorial").val(myArray[4]);

					$("#result").html("Registro siguiente");
				}
			},
		);

		return false;
	});
});
