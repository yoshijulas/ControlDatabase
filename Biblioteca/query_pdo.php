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
    $sql = "INSERT INTO libros(idLibro, nombre, autor, anno, editorial)
     VALUES ('$idLibro', '$nombre', '$autor', '$anno', '$editorial')";
    // prepare sql and execute it
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $error = $stmt->errorInfo();
    if ($error[0] != "00000") {
      if ($error[0] == "23000") {
        echo "Error: El id del libro ya existe";
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
  $idLibro = $_POST["idLibro"];

  if (!empty($idLibro)) {
    $result = $connection->query("SELECT * FROM libros WHERE idLibro = '{$idLibro}' ");
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $saved[] = "$row[idLibro]";
    $saved[] = "$row[nombre]";
    $saved[] = "$row[autor]";
    $saved[] = "$row[anno]";
    $saved[] = "$row[editorial]";

    echo json_encode($saved);
  } else {
    echo "id del libro obligatorio";
  }
}

if (isset($_POST["eliminar"])) {
  $idLibro = $_POST["idLibro"];

  if (!empty($idLibro)) {
    $sql = "DELETE FROM libros WHERE idLibro = '{$idLibro}' ";
    $result = $connection->exec($sql);
    if ($result > 0) {
      echo "Registro eliminado con exito";
    } else {
      echo "Error al eliminar registro: " . $connection->errorInfo();
    }
  } else {
    echo "id del libro obligatorio";
  }
}

if (isset($_POST["actualizar"])) {
  $idLibro = $_POST["idLibro"];
  $nombre = $_POST["nombre"];
  $autor = $_POST["autor"];
  $anno = $_POST["anno"];
  $editorial = $_POST["editorial"];

  if (!empty($idLibro) && !empty($nombre) && !empty($autor) && !empty($anno) && !empty($editorial)) {
    $sql = "UPDATE libros SET nombre = '{$nombre}', autor = '{$autor}',
     anno = '{$anno}', editorial = '{$editorial}' WHERE idLibro = '{$idLibro}' ";

    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $error = $stmt->errorInfo();

    if ($error[0] != "00000") {
      echo "Error: " . $error[2];
    } else {
      echo "Dato actualizado correctamente";
    }
  } else {
    echo "Todos los campos son obligatorios";
  }
}

if (isset($_POST["siguiente"])) {
  $idLibro = $_POST["idLibro"];

  if ($idLibro == "") {
    $idLibro = 0;
  }

  $sql = "SELECT * FROM libros WHERE idLibro > '{$idLibro}' ORDER BY idLibro ASC LIMIT 1";
  $stmt = $connection->prepare($sql);
  $stmt->execute();

  $row = $stmt->fetch();

  if (!is_array($row)) {
    echo "0";
  } else {
    $saved[] = "$row[idLibro]";
    $saved[] = "$row[nombre]";
    $saved[] = "$row[autor]";
    $saved[] = "$row[anno]";
    $saved[] = "$row[editorial]";

    echo json_encode($saved);
  }
}

if (isset($_POST["anterior"])) {
  $idLibro = $_POST["idLibro"];

  if ($idLibro == "") {
    $idLibro = 0;
  }

  $sql = "SELECT * FROM libros WHERE idLibro < '{$idLibro}' ORDER BY idLibro DESC LIMIT 1";
  $stmt = $connection->prepare($sql);
  $stmt->execute();

  $row = $stmt->fetch();

  if (!is_array($row)) {
    echo "0";
  } else {
    $saved[] = "$row[idLibro]";
    $saved[] = "$row[nombre]";
    $saved[] = "$row[autor]";
    $saved[] = "$row[anno]";
    $saved[] = "$row[editorial]";

    echo json_encode($saved);
  }
}
