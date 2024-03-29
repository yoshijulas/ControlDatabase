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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous" />
  <script src="main.ts"></script>
</head>

<body>
  <ul class="grid p-4 grid-cols-5 bg-[#a1672e] border-b-2 border-b-slate-400 text-white font-semibold">
    <ul>
      <li class="hover:text-gray-400">
        <i class="fa fa-book" aria-hidden="true"></i>
        <a href="../Biblioteca/index.php">Usuario</a>
      </li>
      <li class="hover:text-gray-400">
        <i class="fa fa-file" aria-hidden="true"></i>
        <a href="../Admin Control/index.php">Administrador</a>
      </li>
    </ul>
    <li class="col-span-3">
      <header id="title">
        <h1 class="text-center text-5xl font-bold">Biblioteca</h1>
      </header>
    </li>
    <li class="justify-self-end hover:text-gray-400 self-center">
      <i class="fa fa-power-off" aria-hidden="true"></i>
      <a href="../index/logout.php">Cerrar Sesion</a>
    </li>
  </ul>

  <div id="main-container" class="min-w-[18rem]max-w-[30rem] my-4 mx-auto mt-10 w-[50%] rounded-md border-2 border-orange-300 bg-violet-100 p-4">
    <form id="data-form" action="" method="post">
      <div id="input-div" class="flex-row flex-wrap justify-around pb-6">
        <div id="idLibro-div" class="flex flex-col text-center">
          <label for="idLibro" class="text-neutral-500">Id del libro</label>
          <input type="text" name="idLibro" id="idLibro" placeholder="Id del libro" class="m-2 rounded-md border-gray-600 py-1 px-2 shadow" />
        </div>

        <div id="nombre-libro-div" class="flex flex-col text-center">
          <label for="nombre-libro" class="text-neutral-500">Nombre del libro</label>
          <input type="text" name="nombre-libro" id="nombre-libro" placeholder="Nombre del libro" class="m-2 rounded-md border-gray-600 py-1 px-2 shadow" />
        </div>

        <div id="autor-div" class="flex flex-col text-center">
          <label for="autor" class="text-neutral-500">Autor</label>
          <input type="text" name="autor" id="autor" placeholder="Autor" class="m-2 rounded-md border-gray-600 py-1 px-2 shadow" />
        </div>

        <div id="anno-div" class="flex flex-col text-center">
          <label for="anno" class="text-neutral-500">Año</label>
          <input type="text" name="anno" id="anno" placeholder="Año" class="m-2 rounded-md border-gray-600 py-1 px-2 shadow" />
        </div>

        <div id="editorial-div" class="flex flex-col text-center">
          <label for="editorial" class="text-neutral-500">Editorial</label>
          <input type="text" name="editorial" id="editorial" placeholder="Editorial" class="m-2 rounded-md border-gray-600 py-1 px-2 shadow" />
        </div>
      </div>

      <div id="buttons-div" class="flex flex-wrap justify-between">
        <input type="submit" value="Anterior" name="anterior" id="anterior" class="mx-auto my-2 w-32 rounded bg-white py-2 px-8 shadow hover:cursor-pointer hover:bg-slate-200" />
        <input type="submit" value="Añadir" name="anadir" id="anadir" class="mx-auto my-2 w-32 rounded bg-white py-2 px-8 shadow hover:cursor-pointer hover:bg-slate-200" />
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

<!-- Josue Aburto Perez K021 -->