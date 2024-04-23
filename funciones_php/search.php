<?php
$searchTerm = $_POST['search'];

// Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = 'admin123';
$dbname = 'innovagames';
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Consulta SQL para buscar juegos
$sql = "SELECT * FROM juegos WHERE nombre LIKE '%$searchTerm%' OR price LIKE '%$searchTerm%' OR esrb LIKE '%$searchTerm%'";
$result = $conn->query($sql);

// Mostrar los resultados en formato HTML
if ($result->num_rows > 0) {
    echo '<ul>';
    while ($row = $result->fetch_assoc()) {
        echo '<a href="views/template/template.php?id=' . $row['id_juego'] . '">';
        echo '<li>' . htmlspecialchars($row['nombre']) . ' - Precio: ' . $row['price'] . ' - Category: ' . $row['esrb'] . '</li>';
    }
    echo '</ul>';
} else {
    echo 'No se encontraron juegos.';
}

$conn->close();
?>
