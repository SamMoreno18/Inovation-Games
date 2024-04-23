<?php
// Parámetros de conexión a la base de datos
$host = 'localhost';
$dbname = 'innovagames';
$username = 'root';
$password = 'admin123';

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Comprueba si se ha pasado un ID en la URL
  if(isset($_GET['id']) && is_numeric($_GET['id'])) {
      $id_juego = $_GET['id'];

      // Prepara y ejecuta la consulta SQL usando el ID pasado
      $stmt = $conn->prepare("SELECT * FROM juegos WHERE id_juego = :id_juego");
      $stmt->bindParam(':id_juego', $id_juego, PDO::PARAM_INT);
      $stmt->execute();

      // Obtiene el juego
      $juego = $stmt->fetch(PDO::FETCH_ASSOC);

      // Comprueba si se obtuvo un juego
      if(!$juego) {
          echo "Juego no encontrado.";
          exit;
      }
  } else {
      echo "No se especificó el juego.";
      exit;
  }
  $bg_image = $juego['bg']; // Imagen de fondo obtenida de la base de datos.
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($juego['nombre']); ?></title> <!-- Asumiendo que quieres mostrar el nombre del juego como título -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="../../Models/stilo.css">
  <style>body {
    font-family: 'TuFuente', sans-serif;
    background-image: url('../img/<?php echo htmlspecialchars($bg_image); ?>'); 
    background-size: cover;
    background-attachment: fixed;
    position: relative;
    background-position: center;
    z-index: -1;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
}</style>
</head>
<body>
<body>
  <nav>_</nav>
  <header>
    <nav>
      <ul>
        <li><img src="../img/pc.png" alt="Left Icon" class="nav-icon left-icon"><a href="#">PC</a></li>
        <li><img src="../img/logotipo-de-playstation.png" alt="Left Icon" class="nav-icon left-icon"><a
            href="#">PLAYSTATION</a></li>
        <li><img src="../img/xbox.png" alt="Left Icon" class="nav-icon left-icon"><a href="#">XBOX</a></li>
        <li><img src="../img/tecnologia.png" alt="Left Icon" class="nav-icon left-icon"><a href="#">NINTENDO</a></li>
      </ul>
    </nav>
    <div class="search-bar">
      <input type="text" placeholder="Search...">
    </div>
    <a href="../Carrito/carrito.html">
      <img src="../img/carrito.png" alt="Left Icon" class="nav-icon left-icon">
  </a>

  
  </header>

  <main>
  <main>

  <div class="sidebar">
          <img src="../img/<?php echo htmlspecialchars($juego['img_logo']); ?>" alt="Logo Icon" class="logo-icon">
            <!-- Aquí otros datos como el precio, desarrollador, etc. -->
            <div class="purchase-options">
              <div class="compra">
                <button>COMPRALO YA</button>
              </div>
              <button>AGREGAR AL CARRITO</button>
              <button>A LISTA DE DESEOS</button>
            </div>
            <div class="price">
              <span class="sale-price"><?php echo htmlspecialchars($juego['price']); ?></span>
            </div>
            <div class="publisher">
              <strong><?php echo htmlspecialchars($juego['dvloper']); ?></strong>
              <span><?php echo htmlspecialchars($juego['release_date']); ?></span>
              <div class="rating">
              <span>Calificaciones de jugadores</span>
              <div class="stars" id="rating-stars">
                <span class="star" data-value="1">★</span>
                <span class="star" data-value="2">★</span>
                <span class="star" data-value="3">★</span>
                <span class="star" data-value="4">★</span>
                <span class="star" data-value="5">★</span>
              </div>
            </div>
            </div>
          </div>

            </div>
          </div>
  
    <div class="fixed-background"></div>
    <div class="content-container">
      <div class="video-and-requirements">
        <div class="image-cont" id="image-container">
        <?php if ($juego): ?>
        <div class="image-cont" id="image-container">
        <iframe id="videoFrame" width="560" height="315"
      src="<?php echo htmlspecialchars($juego['url_trailer']); ?>" title="YouTube video player"
      frameborder="0" allowfullscreen></iframe>
          <!-- Suponiendo que img1, img2, img3 son URLs a las imágenes -->
        <img id="image1" src="../img/<?php echo htmlspecialchars($juego['img1']); ?>" alt="Imagen 1" class="Hollow">
        <img id="image2" src="../img/<?php echo htmlspecialchars($juego['img2']); ?>" alt="Imagen 2" class="Hollow">
        <img id="image3" src="../img/<?php echo htmlspecialchars($juego['img3']); ?>" alt="Imagen 3" class="Hollow">
          <!-- Más contenido dinámico según sea necesario -->
        </div>
      <?php else: ?>
        <p>Juego no encontrado.</p>
      <?php endif; ?>
      <!-- Aquí termina la parte dinámica -->
    </div>
    <!-- ... resto de tu código HTML ... -->

          

          <div class="system-requirements">
                        <!-- Aquí puedes incluir la descripción específica para Windows, asumiendo que está en la base de datos -->
                        <p><?php echo htmlspecialchars($juego['description']); ?></p>
                    </div>
      
  </main>

  <script src="../template/script.js"></script>
<script src="../../Models/sistema.js"></script>
</body>
</html>
