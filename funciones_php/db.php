<?php
// Parámetros de conexión a la base de datos
$host = 'localhost';  // Puede ser 'localhost' también
$dbname = 'innovagames';  // El nombre de tu base de datos
$username = 'root';  // Tu nombre de usuario para MySQL
$password = 'juanjose04';  // Tu contraseña para MySQL

// Crear conexión utilizando la extensión mysqli
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Si deseas usar UTF-8 como conjunto de caracteres de la conexión (recomendado)
$conn->set_charset("utf8");

// Opcional: Configurar otras opciones o manejar sesiones/errores a nivel global
?>
