<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "innovagames";

// Carpeta donde deseas guardar las imágenes
$uploadFolder = "../Views/img/";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Chequear conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Asegúrate de que el formulario ha sido enviado antes de intentar procesar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar y limpiar los otros datos del formulario
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = $conn->real_escape_string($_POST['price']);
    $developer = $conn->real_escape_string($_POST['developer']);
    $release_date = $conn->real_escape_string($_POST['release_date']);

    // Preparar y vincular
    $stmt = $conn->prepare("INSERT INTO juegos (nombre, description, price, dvloper, release_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $description, $price, $developer, $release_date);

    // Ejecutar
    if ($stmt->execute()) {
        echo "New record created successfully";

        // Ahora procesamos las imágenes. Esta parte asume que en tu formulario
        // los campos para las imágenes se llaman 'img_portada', 'img_logo', etc.
        $img_portada = uploadImage("img_portada", $uploadFolder);
        $img_logo = uploadImage("img_logo", $uploadFolder);
        $img1 = uploadImage("img1", $uploadFolder);
        $img2 = isset($_FILES["img2"]) ? uploadImage("img2", $uploadFolder) : null;
        $img3 = isset($_FILES["img3"]) ? uploadImage("img3", $uploadFolder) : null;

        // Aquí debes actualizar la base de datos con las rutas de las imágenes
        // Suponiendo que tienes columnas en tu tabla para cada imagen

    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();

// Función modificada para manejar la carga de archivos y moverlos al directorio especificado
function uploadImage($imageField, $uploadFolder)
{
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
    $maxSize = 5000000; // 5 MB
    if (!isset($_FILES[$imageField]) || $_FILES[$imageField]['error'] != UPLOAD_ERR_OK) {
        return null; // Retorna null si no hay archivo o hay error
    }
    if (in_array($_FILES[$imageField]['type'], $allowedTypes) && $_FILES[$imageField]['size'] < $maxSize) {
        $target_file = $uploadFolder . basename($_FILES[$imageField]["name"]);
        if (move_uploaded_file($_FILES[$imageField]["tmp_name"], $target_file)) {
            return $target_file; // Retorna la ruta del archivo
        }
    }
    return null; // Retorna null si no cumple los criterios
}
?>