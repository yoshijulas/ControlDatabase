<?php

$hostname = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$dbname = "proyecto"; // Database name

try {
  $connection = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if (isset($_REQUEST["crear"])) {
  $idLibro = $_REQUEST["idLibro"];
  $nombre = $_REQUEST["nombre"];
  $autor = $_REQUEST["autor"];
  $anno = $_REQUEST["anno"];
  $editorial = $_REQUEST["editorial"];

  if (!empty($idLibro) && !empty($nombre) && !empty($autor) && !empty($anno) && !empty($editorial)) {
    $sql = "INSERT INTO biblioteca(idLibro, nombre, autor, anno, editorial)
     VALUES ('$idLibro', '$nombre', '$autor', '$anno', '$editorial')";
    // prepare sql and execute it
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $error = $stmt->errorInfo();
    if ($error[0] != "00000") {
      echo "Error: " . $error[2];
    } else {
      echo "Registro creado";
    }
  } else {
    echo "Todos los campos son obligatorios";
  }
}

// Josue Aburto Perez K021
