<?php
session_start();
include 'db.php'; // Asegúrate de que la ruta es correcta

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    // Preparar y ejecutar la consulta para obtener el username del usuario
    $sqlUser = "SELECT username FROM usuarios WHERE id = ?";
    $stmtUser = $conn->prepare($sqlUser);
    $stmtUser->bind_param("i", $userId);
    $stmtUser->execute();
    $resultUser = $stmtUser->get_result();
    if ($resultUser->num_rows > 0) {
        $userData = $resultUser->fetch_assoc();
        $username = $userData['username']; // Aquí almacenamos el username del usuario
    } else {
        $username = "Usuario no encontrado"; // En caso de que no se encuentre el usuario
    }
    $stmtUser->close();

} else {
    // Si no hay un ID de usuario en la sesión, redirigir al usuario a la página de inicio de sesión.
    header("Location: ../../funciones_php/cerrar_sesion.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Games Library</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../../Models/stylo.css">
</head>
<div class="header-background">
  <div class="flex items-center justify-between">
    <button class="text-xl" id="filtros"><img src="../img/filtrar-removebg-preview.png" alt="left-icon"
        class="nav-icon left-icon"></button>
    <div class="navbar">
      <div class="dropdown">
        <button class="dropbtn" onclick="myFunction()">Account
        </button>
        <div class="dropdown-content" id="myDropdown">
            <a href="../../funciones_php/cerrar_sesion.php">Log Out</a>
            <a href="../../landinguser.php">Home</a>
            <a href="../Wish-list/wish-list.html">My wish list</a>
          </div>
      </div>
    </div>
    <header>
      <nav>
        <ul>
          <li><img src="../img/pc.png" alt="Left Icon" class="nav-icon left-icon"><a href="../pc/pc.html">PC</a></li>
          <li><img src="../img/logotipo-de-playstation.png" alt="Left Icon" class="nav-icon left-icon"><a
              href="../ps/ps.html">PLAYSTATION</a></li>
          <li><img src="../img/xbox.png" alt="Left Icon" class="nav-icon left-icon"><a href="../xbox/xbox.html">XBOX</a></li>
          <li><img src="../img/tecnologia.png" alt="Left Icon" class="nav-icon left-icon"><a href="../nintendo/nintendo.html">NINTENDO</a></li>
        </ul>
      </nav>
      <div class="search-bar">
        <input type="text" placeholder="Search...">
      </div>
      <a href="../Carrito/carrito.html">
        <img src="../img/carrito.png" alt="Left Icon" class="nav-icon left-icon">
    </a>
    </header>
  </div>
</div>
</nav>

<div class="sidebar">

  <button class="border-t border-gray-700">
    <div class="jjk"><img src="../img/filtrar-removebg-preview.png" alt="left-icon" class="nav-icon left-icon"></div>
  </button>

  <div class="space-y-2">
    <input class="palabra" placeholder="Palabras clave">

  </div>
  <div class="space-y-4 mt-4">
      <button id="genero-btn" class="border-t border-gray-700">
        <div class="font-medium">Gender</div>
      </button>
      <div id="genero-options" class="hidden">
        <a href="../Filtro/filtro_accion.html"><div><button class="accion" id="accion" name="accion">-Action</button></div></a>
        <div><button class="accion" id="aventura" name="aventura">-Adventure</button></div>
        <div><button class="accion" id="estrategia" name="estrategia">-Strategy</button></div>
      </div>


      <hr>
      <button class="border-t border-gray-700">
        <div class="font-medium">Price</div>
      </button>
      <hr>
      <button class="border-t border-gray-700">
        <a href="../Ofertas/ofertas.html">Offers</a>
    </div>
    </button>
  </div>
  </div>

<body class="bg-gray-800 text-white font-sans">
  <div class="max-w-screen-lg mx-auto my-10">
    <div class="bg-gray-900 p-5 rounded-lg shadow-lg">

      <div class="mb-0 relative">
    <div class="w-24 h-24 md:w-48 md:h-48 overflow-hidden rounded-full mx-auto relative">
      <img id="profileImage" src="https://placehold.co/100x100" alt="Imagen de perfil actual"
        class="object-cover w-full h-full">
      <input type="file" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
        style="height: 100%;" onchange="updateProfileImage()">
    </div>
</div>
<h3 id="username" class="text-lg text-center mb-3"><?php echo htmlspecialchars($username); ?></h3>
      <div class="flex items-center justify-center mb-3">
        <p id="userDescription" class="text-sm text-gray-400"></p>
        <button id="editDescriptionBtn" onclick="showDescriptionInput()" class="ml-2 text-gray-400 hover:text-white">
          <i class="fas fa-pen"></i>
        </button>
      </div>
      <div id="descriptionInputContainer" class="hidden">
        <textarea id="descriptionInput" class="w-full p-2 text-gray-800"
          placeholder="Describe algo sobre ti..."></textarea>
        <button onclick="updateDescription()"
          class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-3 w-full">Guardar
          Descripción</button>
      </div>

      <?php

      $sql = "SELECT juegos.nombre, juegos.url_portada FROM juegos JOIN usuarios_juegos ON juegos.id_juego = usuarios_juegos.id_juego WHERE usuarios_juegos.id_usuario = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $userId);
      $stmt->execute();
      $result = $stmt->get_result();

      // Código subsiguiente para mostrar los juegos...

      if ($result->num_rows > 0) {
          echo '<div class="container text-center">'; // Contenedor para centrar todo
          while ($row = $result->fetch_assoc()) {
              echo '<div class="mb-4">'; // Contenedor para cada juego
              echo '<img src="../img/' . htmlspecialchars($row['url_portada']) . '" alt="Portada del juego ' . htmlspecialchars($row['nombre']) . '" style="width: 300px; height: auto;" class="img-fluid mx-auto d-block">';              echo '</div>';
          }
          echo '</div>';
      } else {
          echo 'No tienes juegos en tu biblioteca.';
      }
      $stmt->close();
      $conn->close();
  ?>


      </div>
    </div>
  </div>
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
  <script src="../../Models/scriptt.js"></script>
</body>

</body>
</html>