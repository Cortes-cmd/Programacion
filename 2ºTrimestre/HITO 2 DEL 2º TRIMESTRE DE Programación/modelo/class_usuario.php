<?php
//Referencio al archivo conexion puesto que será necesario para el uso de funciones con la base de datos
require_once '../config/conexion.php';

//Clase Usuario para gestionar la tabla de usuario
class Usuario
{
    //Establezco la conexión a la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    //Metodo para agregar un usuario atraves de los parametros nombre, password y email a la base de datos
    public function agregarUsuario($email, $nombre, $password)
    {
        //Encriptamos la contraseña a través de la funcion password_hash
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        //Sintaxis SQL para agregar un usuario con el insert into
        $query = "INSERT INTO usuario (email, nombre, passwd) VALUES (?, ?, ?)";
        //Preparamos la consulta para agregar un usuario
        $stmt = $this->conexion->conexion->prepare($query);
        //Asignamos los valores a los parametros de la consulta
        $stmt->bind_param("sss", $email, $nombre, $hashedPassword,);

        //Si la consulta se ejecuta correctamente, se muestra un mensaje de exito
        if ($stmt->execute()) {
            echo "Usuario agregado con éxito.";
        } else {
            //Si no, se muestra un mensaje de error
            echo "Error al agregar Usuario: " . $stmt->error;
        }

        $stmt->close();
    }

    //Metodo para obtener todos los usuarios de la base de datos atraves del email
    public function obtenerUsuarioPorEmail($email)
    {
        //Sintaxis SQL para seleccionar el usuario por email
        $query = "SELECT * FROM usuario WHERE email = ?";
        //Preparamos la consulta
        $stmt = $this->conexion->conexion->prepare($query);
        //Si la consulta no se ejecuta correctamente, se muestra un mensaje de error
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->conexion->conexion->error);
        }
        //Asignamos el valor al parametro necesario para consulta
        $stmt->bind_param("s", $email);
        //Si no se ejecuta correctamente, se muestra un mensaje de error
        if (!$stmt->execute()) {
            die("Error al ejecutar la consulta: " . $stmt->error);
        }
        //Guardamos el resultado de la consulta en la variable resultado
        $resultado = $stmt->get_result();
        //Si el resultado de la consulta es mayor a 0, se retorna el resultado puesto que se ha encontrado al usuario
        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } //Si no, se muestra un mensaje de error 
        else {
            error_log("Usuario no encontrado: " . $email);
            return null;
        }
    }

}
