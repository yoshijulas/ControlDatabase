<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../index/index.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>proyecto</title>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="main.js"></script>
</head>

<body>
  <header class="border-b-2 border-b-slate-400 bg-slate-300 py-2">
    <h1 class="py-4 text-center text-5xl font-bold text-neutral-700">
      Registro de usuario
    </h1>
  </header>

  <div id="main-container" class="mx-auto my-4 mt-10 w-[50%] min-w-[18rem] max-w-[30rem] rounded-md border-2 border-orange-300 bg-violet-100 p-4">
    <form id="data-form" action="" method="post">
      <div id="input-div" class="flex-col flex-wrap justify-around pb-6">
        <div id="correo-div" class="flex flex-col text-center">
          <label for="correo" class="text-neutral-500">Correo</label>
          <input type="text" name="correo" id="correo" placeholder="Correo" class="m-2 rounded-md border-gray-600 py-1 px-2 shadow" />
        </div>

        <div id="nombre-div" class="flex flex-col text-center">
          <label for="nombre" class="text-neutral-500">Nombre</label>
          <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="m-2 rounded-md border-gray-600 py-1 px-2 shadow" />
        </div>

        <div id="telefono-div" class="flex flex-col text-center">
          <label for="telefono" class="text-neutral-500">Telefono</label>
          <input type="text" name="telefono" id="telefono" placeholder="Telefono" class="m-2 rounded-md border-gray-600 py-1 px-2 shadow" />
        </div>

        <div id="contrasena-div" class="flex flex-col text-center">
          <label for="contrasena" class="text-neutral-500">Contraseña</label>
          <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" class="m-2 rounded-md border-gray-600 py-1 px-2 shadow" />
        </div>
      </div>

      <div id="buttons-div" class="flex flex-wrap justify-between">
        <input type="submit" value="Crear" name="crear" id="crear" class="mx-auto my-2 w-32 rounded bg-white py-2 px-8 shadow hover:cursor-pointer hover:bg-slate-200" />
        <input type="submit" value="Restablecer contraseña" name="restablecer" id="restablecer" class="mx-auto my-2 w-auto rounded bg-white py-2 px-4 shadow hover:cursor-pointer hover:bg-slate-200" />
      </div>
    </form>
  </div>

  <div id="status-div" class="flex flex-col justify-center">
    <h3 class="mx-auto my-2 rounded bg-red-200 py-2 px-8 text-rose-800 shadow">
      Status
    </h3>
    <span id="result" class="mx-auto my-2 max-h-min min-h-[5rem] min-w-[15rem] max-w-min rounded bg-red-200 py-6 text-center shadow"></span>
  </div>
  <input onclick="document.location = '../index/logout.php'
      " value="Cerrar sesión" name="exit" id="exit" class="absolute top-[90%] my-2 w-fill rounded bg-slate-400 text-white py-3 px-5 shadow hover:cursor-pointer hover:text-black hover:bg-slate-200" />
</body>

</html>