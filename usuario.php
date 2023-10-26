<?php
require 'includes/app.php';
$db = conectarDB();

// Crear un email y password
$email = "correo@correo.cl";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);


// Query para crear el usuario
$query = " INSERT INTO usuario (nombre, apellido, email, password, rol) VALUES ('','', '${email}', '${passwordHash}', 1); ";

// Agregarlo a la base de datos
mysqli_query($db, $query);