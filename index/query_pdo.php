<?php
session_start();

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

if (isset($_REQUEST["login"])) {
  $usuario = $_REQUEST["usuario"];
  $password = $_REQUEST["password"];

  if (!empty($usuario) && !empty($password)) {
    $sql = "SELECT * FROM login WHERE username='$usuario' AND password='$password'";
    // prepare sql and execute it
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();

    if ($row) {
      if ("$row[admin]" == "1") {
        $_SESSION["username"] = $usuario;
        $_SESSION["admin"] = true;
        echo "1";
      } else {
        $_SESSION["username"] = $usuario;
        $_SESSION["admin"] = false;
        echo "2";
      }
    } else {
      echo "0";
    }
  } else {
    echo "Todos los campos son obligatorios";
  }
}
