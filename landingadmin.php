<?php
session_start();

if (isset($_SESSION['username'])) {

  $username = $_SESSION['username'];
} else {
  header("Location: funciones_php/cerrar_sesion.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Innovation Games</title>
  <link rel="stylesheet" href="Models/stylo.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

  </style>
</head>

<body class="bg-gray-900 text-white font-'Open Sans'">
  <div class="header-background">
    <div class="flex items-center justify-between">
      <button class="text-xl" id="filtros"><img src="views/img/filtrar-removebg-preview.png" alt="left-icon" class="nav-icon left-icon"></button>
      <div class="navbar">
        <div class="dropdown">
          <button class="dropbtn" onclick="myFunction()">Account
          </button>
          <div class="dropdown-content" id="myDropdown">
            <a href="funciones_php/cerrar_sesion.php">Log-out</a>
            <a href="views/cuenta/cuentaadmin.php">My profile</a>
            <a href="views/update/subida_juegos.html">Add a new game</a>
          </div>
        </div>
      </div>
      <header>
        <nav>
          <ul>
            <li><img src="views/img/pc.png" alt="Left Icon" class="nav-icon left-icon"><a href="views/pc/pc.html">PC</a>
            </li>
            <li><img src="views/img/logotipo-de-playstation.png" alt="Left Icon" class="nav-icon left-icon"><a href="views/ps/ps.html">PlayStation</a></li>
            <li><img src="views/img/xbox.png" alt="Left Icon" class="nav-icon left-icon"><a href="views/xbox/xbox.html">Xbox</a></li>
            <li><img src="views/img/tecnologia.png" alt="Left Icon" class="nav-icon left-icon"><a href="views/nintendo/nintendo.html">Nintendo</a></li>
          </ul>
        </nav>
        <div class="search-bar">
          <input type="text" placeholder="Search...">
        </div>
        <a href="../Carrito/carrito.html">
          <img src="views/img/carrito.png" alt="Left Icon" class="nav-icon left-icon">
        </a>
      </header>
    </div>
  </div>
  </nav>

  <div class="sidebar">
        <button class="border-t border-gray-700">
            <div class="jjk"><img src="views/img/filtrar-removebg-preview.png" alt="left-icon" class="nav-icon left-icon"></div>
        </button>
        <h1>Find your game</h1>
        <input type="text" class="hola" id="search-input" placeholder="Buscar...">
        <div id="search-results"></div>



  </div>
  </div>


  </nav>
  <!-- Hero Section -->
  <section id="hero-section" class="hero-section text-center p-20 bg-blue-600 bg-opacity-25">
    <h1 class="text-5xl font-bold mb-6">The Adventure of The Game Begins Here!</h1>
    <p class="mb-6">Navigate to new gaming universes. At Gaming Galaxia, every moment is an adventure. Dive into the
      endless world of video games now.</p>
  </section>

  <section class="si">
    <p class="text-2xl mb-6">Trending</p>
    <div class="carousel">
      <div class="carousel-inner">
      <?php
          include 'funciones_php/db.php'; 
        
          // Aquí puedes modificar la consulta si necesitas filtrar por usuario o traer todos los juegos
          $sql = "SELECT id_juego,nombre, url_portada FROM juegos";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $result = $stmt->get_result();
        
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo '<div class="carousel-item">';
        
                  
                  echo '<a href="views/template/template.php?id=' . $row['id_juego'] . '">';
                  echo '<img src="Views/img/' . htmlspecialchars($row['url_portada']) . '" alt="' . htmlspecialchars($row['nombre']) . '">';
                  echo '</a></div>';
              }
          } else {
              echo "No hay juegos disponibles en este momento.";
          }
          $conn->close();
          ?>

      </div>
    </div>
  </section>
  <!-- Trending Section -->
  <section class="sii">
    <h2 class="text-2xl mb-6">Trending</h2>
    <div class="carousel">
      <div class="carousel-inner">
        <div class="carousel-item">
          <a href="views/Cyberpunk/ciberp.html">
            <img src="views/img/Cyberbug.png" alt="Imagen 1">
          </a>
        </div>
        <div class="carousel-item">
          <a href="views/Civilization/civilization.html">
            <img src="views/img/CivilitationL.png" alt="Imagen 2">
          </a>
        </div>
        <div class="carousel-item">
          <a href="views/Lethal Company/lethal.html">
            <img src="views/img/lethalcp.png" alt="Imagen 3">
          </a>
        </div>
        <div class="carousel-item">
          <a href="views/Red Dead Redemption/rdr.html">
            <img src="views/img/Rdr2L.png" alt="Imagen 4">
          </a>
        </div>
      </div>
    </div>
  </section>
  <footer class="grid grid-cols-3 gap-4 text-center py-6 bg-black bg-opacity-75">
    <div>
      <span class="fas fa-download"></span>
      <h3 class="text-lg mt-2">Ultra Fast</h3>
      <p>Instant Download</p>
    </div>
    <div>
      <span class="fas fa-shield-alt"></span>
      <h3 class="text-lg mt-2">Reliable and Safe</h3>
      <p>Over 10,000 games</p>
    </div>
    <div>
      <span class="fas fa-thumbs-up"></span>
      <h3 class="text-lg mt-2">99% User Approval</h3>
      <p>Our users love what we offer!</p>
    </div>
  </footer>



  <!-- scripts de javascript -->

  <script src="Models/scriptt.js"></script>
  <script>
    // Código JavaScript

    document.getElementById('search-input').addEventListener('input', function() {
      var searchTerm = this.value;
      if (searchTerm.length < 3) {
        document.getElementById('search-results').innerHTML = '';
        return;
      }
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'funciones_php/search.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (xhr.status === 200) {
          document.getElementById('search-results').innerHTML = xhr.responseText;
        } else {
          console.log('Error: ' + xhr.statusText);
        }
      };
      xhr.send('search=' + encodeURIComponent(searchTerm));
    });
  </script>

</body>

</html>