<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Inicio de Sesion</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- <link rel="stylesheet" href="./assets/css/reset.css">  -->
    <link rel="stylesheet" href="Models/assets/css/styles.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' rel='stylesheet'>
    <!-- Tu HTML anterior -->

    <form id="formAgregarUsuario" action="new_user.php" method="post">
        <!-- Contenido del formulario -->
    </form>

    <!-- Tu HTML anterior -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function agregarUsuario() {
            var username = document.getElementById('regUsername').value;
            var email = document.getElementById('regEmail').value;
            var password = document.getElementById('regPassword').value;
            var u_type = (2).vale;

            $.ajax({
                type: 'POST',
                url: 'new_user.php',
                data: {
                    username: username,
                    email: email,
                    password: password,
                    u_type: u_type
                },
                success: function (response) {
                    alert('Usuario agregado correctamente');
                    document.getElementById('regUsername').value = '';
                    document.getElementById('regEmail').value = '';
                    document.getElementById('regPassword').value = '';
                    // actualizarListaUsuarios(); // Esto parece ser una función adicional que deberías definir si es necesario
                }
            });
        }

        $(document).ready(function () {
            $('#formAgregarUsuario').submit(function (e) {
                e.preventDefault(); // Evita que el formulario se envíe por defecto
                agregarUsuario(); // Llama a la función para agregar usuario
            });
        });
    </script>

</head>

<body>
    <span class="login-mask"></span>

    <div class="container">
        <div class="box">
            <div class="box-login" id="login">
                <div class="top-header">
                    <h3>Hello</h3>
                    <small>Welcome to Inovation Games</small>
                </div>
                <form action="funciones_php/login.php" method="post">
                    <div class="input-group">
                        <div class="input-field">
                            <input type="text" class="input-box" id="logEmail" name="username" required>
                            <label for="logEmail">Email address or Username</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input-box" id="logPassword" name="password" required>
                            <label for="logPassword">Password</label>
                            <div class="eye-area">
                                <div class="eye-box" onclick="myLogPassword()">
                                    <i class="fa-regular fa-eye" id="eye"></i>
                                    <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                                </div>
                            </div>
                        </div>
                        <div class="remember">
                            <input type="checkbox" id="formCheck" class="check">
                            <label for="formCheck">Remember Me</label>
                        </div>
                        <div class="input-field">
                            <button name="submit" type="submit" class="input-submit" value="Sign In"
                                required>Ingress</button>

                        </div>
                        <div class="forgot">
                            <a href="#">Forgot password?</a>
                        </div>

                    </div>
                </form>
            </div>
            <!---------------------------- register --------------------------------------->
            <div class="box-register" id="register">
                <div class="top-header">
                    <h3>Sign Up, Now!</h3>
                    <small>We are happy to have you with us.</small>
                </div>
                <form id="formAgregarUsuario" action="funciones_php/new_user.php" method="post">
                    <div class="input-group">
                        <div class="input-field">
                            <input type="text" class="input-box" id="regUsername" required>
                            <label for="regUsername">Username</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input-box" id="regEmail" required>
                            <label for="regEmail">Email address</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input-box" id="regPassword" required>
                            <label for="regPassword">Password</label>
                            <div class="eye-area">
                                <div class="eye-box" onclick="myRegPassword()">
                                    <i class="fa-regular fa-eye" id="eye-2"></i>
                                    <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                                </div>
                            </div>
                        </div>


                        <div class="remember">
                            <input type="checkbox" id="formCheck2" class="check">
                            <label for="formCheck2">Remember Me</label>
                        </div>
                        <div class="input-field">
                            <button type="submit" name="submit" class="input-submit" onclick="agregarUsuario()"> Sign
                                Up</button>
                        </div>
                </form>
            </div>
        </div>
        <div class="switch">
            <a href="#" class="login active" onclick="login()">Login</a>
            <a href="#" class="register" onclick="register()">Register</a>
            <div class="btn-active" id="btn"></div>
        </div>

    </div>

    </div>
    <script>

        // Funcion para registrar usuarios
        function agregarUsuario() {
            var username = document.getElementById('regUsername').value;
            var email = document.getElementById('regEmail').value;
            var password = document.getElementById('regPassword').value;


            $.ajax({
                type: 'POST',
                url: 'funciones_php/new_user.php',
                data: {
                    username,
                    email,
                    password
                },
                success: function (response) {
                    alert('Usuario agregado correctamente');
                    document.getElementById('regUsername').value = '';
                    document.getElementById('regEmail').value = '';
                    document.getElementById('regPassword').value = '';
                    actualizarListaUsuarios();
                }
            });
        }

        $(document).ready(function () {
        $('#formAgregarUsuario').submit(function (e) {
            e.preventDefault(); // Evita que el formulario se envíe por defecto
            agregarUsuario(); // Llama a la función para agregar usuario
        });
    });






            var x = document.getElementById('login');
            var y = document.getElementById('register');
            var z = document.getElementById('btn');

            function login() {
                x.style.left = "27px";
                y.style.right = "-350px";
                z.style.left = "0px";
            }

            function register() {
                x.style.left = "-350px";
                y.style.right = "25px";
                z.style.left = "150px";
            }
            // View Password codes
            function myLogPassword() {
                var a = document.getElementById("logPassword");
                var b = document.getElementById("eye");
                var c = document.getElementById("eye-slash");
                if (a.type === "password") {
                    a.type = "text";
                    b.style.opacity = "0";
                    c.style.opacity = "1";
                } else {
                    a.type = "password";
                    b.style.opacity = "1";
                    c.style.opacity = "0";
                }
            }

            function myRegPassword() {

                var d = document.getElementById("regPassword");
                var b = document.getElementById("eye-2");
                var c = document.getElementById("eye-slash-2");

                if (d.type === "password") {
                    d.type = "text";
                    b.style.opacity = "0";
                    c.style.opacity = "1";
                } else {
                    d.type = "password";
                    b.style.opacity = "1";
                    c.style.opacity = "0";
                }
            }



    </script>


</body>

</html>