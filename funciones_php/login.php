<?php
session_start();

// Detalles de la base de datos
$servname = "localhost";
$username = "root";
$password = "admin123";
$database = "innovagames";

// Crear una conexion
$conn = new mysqli($servname, $username, $password, $database);
if ($conn->connect_error) {
    die("Coneccion Fallida: " .$conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Asegúrate de incluir el id_usuario en tu consulta SQL
$sql = "SELECT id, username, u_type, password FROM usuarios WHERE username = ? AND password = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['id'] = $row['id']; // Almacena el ID del usuario en la sesión
    $_SESSION['username'] = $row['username'];
    if ($row['u_type'] == 1) {
        header("Location: ../landingadmin.php");
    } elseif ($row['u_type'] == 2) {
        header("Location: ../landinguser.php");
    } else {
        echo "Tipo de usuario desconocido";
    }
} else {
    echo "Fallo al iniciar sesion <a href='../index.php'>Intentar de nuevo</a>";
}

$conn->close();
?>
