<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['admin']) {
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous" />
  <script src="main.ts"></script>
</head>

<body>
  <ul class="grid p-4 grid-cols-5 bg-slate-300 border-b-2 border-b-slate-400 text-neutral-700 font-semibold">
    <ul>
      <li class="hover:text-gray-400">
        <i class="fa fa-book" aria-hidden="true"></i>
        <a href="../Biblioteca/index.php">Biblioteca</a>
      </li>
      <li class="hover:text-gray-400">
        <i class="fa fa-file" aria-hidden="true"></i>
        <a href="../User Control/index.php">Alumnos</a>
      </li>
    </ul>
    <li class="col-span-3">
      <header id="title">
        <h1 class="text-center text-5xl font-bold">
          Consulta de Informacion
        </h1>
      </header>
    </li>
    <li class="justify-self-end hover:text-gray-400 self-center">
      <i class="fa fa-power-off" aria-hidden="true"></i>
      <a href="../index/logout.php">Cerrar Sesion</a>
    </li>
  </ul>

  <div id="main-container" class="mx-6 my-4 mt-10 rounded-md border-2 border-orange-300 bg-violet-100 p-4">
    <form id="data-form" action="" method="post">
      <div id="input-div" class="flex flex-wrap justify-around pb-6">
        <div id="matricula-div" class="flex flex-col text-center">
          <label for="matricula" class="text-neutral-500">Matricula</label>
          <input type="text" name="matricula" id="matricula" placeholder="Matricula" class="m-2 rounded-md border-gray-600 py-1 px-2 shadow" />
        </div>

        <div id="nombre-div" class="flex flex-col text-center">
          <label for="nombre" class="text-neutral-500">Nombre</label>
          <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="m-2 rounded-md border-gray-600 py-1 px-2 shadow" />
        </div>

        <div id="telefono-div" class="flex flex-col text-center">
          <label for="telefono" class="text-neutral-500">Telefono</label>
          <input type="text" name="telefono" id="telefono" placeholder="Telefono" class="m-2 rounded-md border-gray-600 py-1 px-2 shadow" />
        </div>

        <div id="edad-div" class="flex flex-col text-center">
          <label for="edad" class="text-neutral-500">Edad</label>
          <input type="text" name="edad" id="edad" placeholder="Edad" class="m-2 rounded-md border-gray-600 py-1 px-2 shadow" />
        </div>
      </div>

      <div id="buttons-div" class="flex flex-wrap justify-between">
        <input type="submit" value="Anterior" name="anterior" id="anterior" class="mx-auto my-2 w-32 rounded bg-white py-2 px-8 shadow hover:cursor-pointer hover:bg-slate-200" />
        <input type="submit" value="Crear" name="crear" id="crear" class="mx-auto my-2 w-32 rounded bg-white py-2 px-8 shadow hover:cursor-pointer hover:bg-slate-200" />
        <input type="submit" value="Buscar" name="buscar" id="buscar" class="mx-auto my-2 w-32 rounded bg-white py-2 px-8 shadow hover:cursor-pointer hover:bg-slate-200" />
        <input type="submit" value="Eliminar" name="eliminar" id="eliminar" class="mx-auto my-2 w-32 rounded bg-white py-2 px-8 shadow hover:cursor-pointer hover:bg-slate-200" />
        <input type="submit" value="Actualizar" name="actualizar" id="actualizar" class="mx-auto my-2 w-32 rounded bg-white py-2 px-8 shadow hover:cursor-pointer hover:bg-slate-200" />
        <input type="submit" value="Siguiente" name="siguiente" id="siguiente" class="mx-auto my-2 w-32 rounded bg-white py-2 px-8 shadow hover:cursor-pointer hover:bg-slate-200" />
      </div>
    </form>
  </div>

  <div id="status-div" class="flex flex-col justify-center">
    <h3 class="mx-auto my-2 rounded bg-red-200 py-2 px-8 text-rose-800 shadow">
      Status
    </h3>
    <span id="result" class="mx-auto my-2 max-h-min min-h-[5rem] min-w-[15rem] max-w-min rounded bg-red-200 py-6 text-center shadow"></span>
  </div>
</body>

</html>