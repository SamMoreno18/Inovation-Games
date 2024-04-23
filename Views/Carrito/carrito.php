<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "innovagames";

// Asegúrate de validar el ID del juego recibido
$idJuego = isset($_GET['id_juego']) ? intval($_GET['id_juego']) : 0; // Default a 0 o maneja como error si es necesario
// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);
// Asegúrate de manejar cualquier error de conexión aquí
if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}

$idUsuario = $_SESSION['id'];
$idJuego = isset($_GET['id_juego']) ? intval($_GET['id_juego']) : 0; // Recuperar el ID del juego desde GET y validar

// Prepara y ejecuta la consulta a la base de datos para insertar
$sql_insert = "INSERT INTO usuarios_juegos (id_usuario, id_juego) VALUES (?, ?)";
$stmt_insert = $conexion->prepare($sql_insert);
$stmt_insert->bind_param("ii", $idUsuario, $idJuego);
$stmt_insert->execute();
$stmt_insert->close();

// Prepara y ejecuta la consulta a la base de datos
$sql = "SELECT nombre, price, img_logo FROM juegos WHERE id_juego = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idJuego);
$stmt->execute();
$stmt->bind_result($nombreJuego, $precioJuego, $imagenLogo);
$stmt->fetch();
$stmt->close();
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasarela de Pago</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos_car.css">
    <script src="https://kit.fontawesome.com/tu-codigo-font-awesome.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <!-- Sección Izquierda: Método de Pago (ahora 4 columnas) -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Método de Pago</h3>
                        <div class="wrapper">
                            <div class="credit-card">
                                <div class="card-front">
                                    <div class="branding">
                                      <img src="Views/img/ima/chip-removebg-preview.png" class="chip-img" />
                                      <img src="Views/img/ima/Visa-Logo.png" class="visa-logo" />
                                    </div>
                                    <div class="card-number">
                                      <div>
                                        <span class="card-number-display">_</span>
                                        <span class="card-number-display">_</span>
                                        <span class="card-number-display">_</span>
                                        <span class="card-number-display">_</span>
                                      </div>
                                      <div>
                                        <span class="card-number-display">_</span>
                                        <span class="card-number-display">_</span>
                                        <span class="card-number-display">_</span>
                                        <span class="card-number-display">_</span>
                                      </div>
                                      <div>
                                        <span class="card-number-display">_</span>
                                        <span class="card-number-display">_</span>
                                        <span class="card-number-display">_</span>
                                        <span class="card-number-display">_</span>
                                      </div>
                                      <div>
                                        <span class="card-number-display">_</span>
                                        <span class="card-number-display">_</span>
                                        <span class="card-number-display">_</span>
                                        <span class="card-number-display">_</span>
                                      </div>
                                    </div>
                                    <div class="details">
                                      <div>
                                        <span>Card Holder</span>
                                        <span id="card-holder-name">Your Name Here</span>
                                      </div>
                                      <div>
                                        <span>Expires</span>
                                        <span id="validity">06/28</span>
                                      </div>
                                    </div>
                                  </div>
                                <div class="card-back">
                                    <div class="card-back">
                                        <div class="black-strip"></div>
                                        <div class="white-strip">
                                          <span>CVV</span>
                                          <div id="cvv-display"></div>
                                        </div>
                                        <img src="Views/img/ima/Visa-Logo.png" class="visa-logo" />
                                      </div>
                                </div>
                            </div>
                            <form>
                                <label for="card-number">Card Number</label>
                                <input type="number" id="card-number" placeholder="1234123412341234" />
                                <label for="card-holder">Card Holder:</label>
                                <input type="text" id="card-name-input" placeholder="Your Name" />
                                <div class="date-cvv">
                                  <div>
                                    <label for="validity">Expires On:</label>
                                    <input type="date" id="validity-input" />
                                  </div>
                                  <div>
                                    <label for="cvv">CVV:</label>
                                    <input type="number" id="cvv" placeholder="***" />
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Sección Derecha: Resumen del Pedido (ahora 8 columnas) -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        RESUMEN DEL PEDIDO
                        <!-- ... -->
                    </div>
                    <div class="card-body">
                        <div class="media">
                            <!-- Usamos la variable PHP para mostrar la imagen del logo -->
                            <img src="ruta/a/tu/directorio/de/imagenes/<?php echo htmlspecialchars($imagenLogo); ?>" class="mr-3" alt="Imagen del juego" style="width: 60px;">
                            <div class="media-body">
                                <!-- Mostramos el nombre y precio del juego -->
                                <h5 class="mt-0"><?php echo htmlspecialchars($nombreJuego); ?></h5>
                                <p><?php echo htmlspecialchars($precioJuego); ?> MXN</p>
                            </div>
                        </div>
                        <!-- ... resto de tu código ... -->
                        <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="termsModalLabel">Términos y Condiciones</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Aquí van los términos y condiciones detallados...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-block" onclick="realizarPedido()">REALIZAR PEDIDO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.7.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="ruta/a/card.js"></script>  
<script src="/Models/scriptcar.js"></script>
<script>
function realizarPedido() {
    // Aquí puedes colocar la URL a la que deseas redireccionar después de realizar el pedido
    window.location.href = "pagina_de_compra_lograda.html";
}
</script>
</body>
</html>
