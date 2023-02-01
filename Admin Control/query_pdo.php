<?php

define("SUCCESS", "00000");

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
  $matricula = $_REQUEST["matricula"];
  $nombre = $_REQUEST["nombre"];
  $telefono = $_REQUEST["telefono"];
  $edad = $_REQUEST["edad"];

  if (!empty($matricula) && !empty($nombre) && !empty($telefono) && !empty($edad)) {
    $sql = "INSERT INTO datos(matricula, nombre, telefono, edad)
     VALUES ('$matricula', '$nombre', '$telefono', '$edad')";
    // prepare sql and execute it
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $error = $stmt->errorInfo();
    if ($error[0] != SUCCESS) {
      if ($error[0] == "23000") {
        echo "Error: La matricula ya existe";
      } else {
        echo "Error: " . $error[2];
      }
    } else {
      echo "Registro creado";
    }
  } else {
    echo "Todos los campos son obligatorios";
  }
}

if (isset($_POST["buscar"])) {
  $matricula = $_POST["matricula"];

  if (!empty($matricula)) {
    $result = $connection->query("SELECT * FROM datos WHERE matricula = '{$matricula}' ");
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $saved[] = "$row[matricula]";
    $saved[] = "$row[nombre]";
    $saved[] = "$row[telefono]";
    $saved[] = "$row[edad]";

    echo json_encode($saved);
  } else {
    echo "Matricula obligatoria";
  }
}

if (isset($_POST["eliminar"])) {
  $matricula = $_POST["matricula"];

  if (!empty($matricula)) {
    $sql = "DELETE FROM datos WHERE matricula = '{$matricula}' ";
    $result = $connection->exec($sql);
    if ($result > 0) {
      echo "Registro eliminado con exito";
    } else {
      echo "Error al eliminar registro: " . $connection->errorInfo();
    }
  } else {
    echo "Matricula obligatoria";
  }
}

if (isset($_POST["actualizar"])) {
  $matricula = $_POST["matricula"];
  $nombre = $_POST["nombre"];
  $telefono = $_POST["telefono"];
  $edad = $_POST["edad"];

  if (!empty($matricula) && !empty($nombre) && !empty($telefono) && !empty($edad)) {
    $sql = "UPDATE datos SET nombre = '{$nombre}', telefono = '{$telefono}',
     edad = '{$edad}' WHERE matricula = '{$matricula}' ";

    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $error = $stmt->errorInfo();

    if ($error[0] != SUCCESS) {
      echo "Error: " . $error[2];
    } else {
      echo "Dato actualizado correctamente";
    }
  } else {
    echo "Todos los campos son obligatorios";
  }
}

if (isset($_POST["siguiente"])) {
  $matricula = $_POST["matricula"];

  if ($matricula == "") {
    $matricula = 0;
  }

  $sql = "SELECT * FROM datos WHERE matricula > '{$matricula}' ORDER BY matricula ASC LIMIT 1";
  $stmt = $connection->prepare($sql);
  $stmt->execute();

  $row = $stmt->fetch();

  if (!is_array($row)) {
    echo "0";
  } else {
    $saved[] = "$row[matricula]";
    $saved[] = "$row[nombre]";
    $saved[] = "$row[telefono]";
    $saved[] = "$row[edad]";

    echo json_encode($saved);
  }
}

if (isset($_POST["anterior"])) {
  $matricula = $_POST["matricula"];

  if ($matricula == "") {
    $matricula = 0;
  }

  $sql = "SELECT * FROM datos WHERE matricula < '{$matricula}' ORDER BY matricula DESC LIMIT 1";
  $stmt = $connection->prepare($sql);
  $stmt->execute();

  $row = $stmt->fetch();

  if (!is_array($row)) {
    echo "0";
  } else {
    $saved[] = "$row[matricula]";
    $saved[] = "$row[nombre]";
    $saved[] = "$row[telefono]";
    $saved[] = "$row[edad]";

    echo json_encode($saved);
  }
}
