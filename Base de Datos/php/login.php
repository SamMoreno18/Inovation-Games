<?php
session_start();

// Detalles de la base de datos

$servname = "localhost";
$username = "root";
$password = "";
$database = "login";

// Crear una conexion
$conn = new mysqli($servname, $username, $password, $database);
if ($conn->connect_error) {
    die("Coneccion Fallida: " .$conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT username, password FROM usuarios 
WHERE username = '$username' AND password = '$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    header("Location:  welcome.php");
} else {
    echo "inicio de sesion fallida <a href='../index.html'> Intentar de nuevo</a>";
}

$conn->close();
