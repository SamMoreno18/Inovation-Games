<?php
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    // Conectar a la base de datos
    $servname = "localhost";
    $username = "root";
    $password = "admin123";
    $dbname = "innovagames";

    $conn = new mysqli($servname, $username, $password, $dbname);

    // verificamos conexión exitosa
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // obtener los datos del formulario
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $u_type;

    // consulta dentro de la base de datos para agregar usuario
    $sql = "INSERT INTO usuarios (username, email, password, u_type) 
    VALUES ('$username', '$email', '$password', 2)";

    // ejecutamos la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Usuario agregado correctamente";
    } else {
        echo "Error al agregar usuario: " . $conn->error;
    }

    // terminamos la conexión con la base de datos
    $conn->close();
} else {
    echo "Todos los campos son obligatorios";
}