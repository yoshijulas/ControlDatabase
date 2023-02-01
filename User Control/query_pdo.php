<?php

define("SUCCESS", "00000");
define("ERROR_PREFIX", "Error: ");

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
    $correo = $_REQUEST["correo"];
    $nombre = $_REQUEST["nombre"];
    $telefono = $_REQUEST["telefono"];
    $contrasena = $_REQUEST["contrasena"];

    if (!empty($correo) && !empty($nombre) && !empty($telefono) && !empty($contrasena)) {
        $sql = "INSERT INTO usuario(correo, nombre, telefono, contrasena)
     VALUES ('$correo', '$nombre', '$telefono', '$contrasena')";
        // prepare sql and execute it
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $error = $stmt->errorInfo();
        if ($error[0] != SUCCESS) {
            if ($error[0] == "23000") {
                echo "El correo ya existe";
            } else {
                echo ERROR_PREFIX . $error[2];
            }
        } else {
            echo "Registro creado";
        }
    } else {
        echo "Todos los campos son obligatorios";
    }
}

if (isset($_REQUEST["restablecer"])) {
    $correo = $_REQUEST["correo"];
    $contrasena = $_REQUEST["contrasena"];

    if (!empty($correo) && !empty($contrasena)) {
        $sql = "SELECT * FROM usuario WHERE correo = '{$correo}' ";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $error = $stmt->errorInfo();
        if ($error[0] != SUCCESS) {
            echo ERROR_PREFIX . $error[2];
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $sql = "UPDATE usuario SET contrasena = '{$contrasena}' WHERE correo = '{$correo}' ";
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $error = $stmt->errorInfo();
                if ($error[0] != SUCCESS) {
                    echo ERROR_PREFIX . $error[2];
                } else {
                    echo "Contraseña actualizada";
                }
            } else {
                echo "El correo no existe";
            }
        }
    }
}
