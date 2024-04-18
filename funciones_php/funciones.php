<?php
session_start();

class Conexion
{
    public $host = 'localhost';
    public $usuario = 'root';
    public $pass = '';
    public $database_name = 'innova-games';
    public $conexion;

    public function __construct()
    {
        $this->conexion = mysqli_connect(
            $this->host,
            $this->usuario,
            $this->pass,
            $this->database_name
        );
    }
}


/**Metodo para iniciar sesion **/

class Inicio_sesion extends Conexion
{
    public $id;

    public function InicioSesion($logEmail, $logPass)
    {
        $consultaSql = mysqli_query(
            $this->conexion,
            "SELECT * FROM users WHERE email = '$logEmail' or username = '$logEmail'"
        );

        $columna = mysqli_fetch_assoc($consultaSql);

        if (mysqli_num_rows($consultaSql) > 0) {
            if ($logPass == $columna['password']) {
                $this->id = $columna['id'];
                return 1;
                /** inicio exitoso **/
            } else {
                return 10;
                /** inicio incorrecto **/
            }
        } else {
            return 100;
            /** usuario no registrado **/
        }
    }

    public function IdUsuario()
    {
        return $this->id;
    }
}

class Select extends Conexion
{
    public function SelectuserByUser($id)
    {
        $resultado = mysqli_query($this->conexion, "SELECT * FROM users WHERE id = '$id' ");

        return mysqli_fetch_assoc($resultado);
    }
}
