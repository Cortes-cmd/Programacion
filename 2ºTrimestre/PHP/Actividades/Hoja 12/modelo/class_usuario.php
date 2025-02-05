<?php
require_once '../config/conexion.php';

class Usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function AgregarUsuario($usuario,$password,$rol) {

        $query = "INSERT INTO usuario (usuario,passwd,rol) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $usuario,$password,$rol);

        if ($stmt->execute()) {
            echo "Usuario agregado con éxito.";
        } else {
            echo "Error al agregar usuario: " . $stmt->error;
        }

        $stmt->close();
    }

    public function ObtenerUsuarios() {
        $query = "SELECT * FROM usuario";
        $resultado = $this->conexion->conexion->query($query);
        $usuario = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuario[] = $fila;
        }
        return $usuario;
    }

    public function ObtenerUsuarioPorId($id_usuario) {
        $query = "SELECT * FROM usuario WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function ActualizarUsuario($id_usuario, $usuario, $password, $rol) {
        $query = "UPDATE usuario SET usuario = ?, passw = ?, rol = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $usuario, $password, $rol, $id_usuario);

        if ($stmt->execute()) {
            echo "Usuario actualizado con éxito.";
        } else {
            echo "Error al actualizar usuario: " . $stmt->error;
        }

        $stmt->close();
    }

    public function EliminarUsuario($id_usuario) {
        $query = "DELETE FROM usuario WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);

        if ($stmt->execute()) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar usuario: " . $stmt->error;
        }

        $stmt->close();
    }
    public function VerificarUsuario($usuario, $password) {
        // Depuración: Mostrar los valores de las variables
        // echo "Usuario: $usuario, Password: $password<br>";
    
        $query = "SELECT * FROM usuario WHERE usuario = ? AND passwd = ? ";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ss", $usuario, $password);
    
        if ($stmt->execute()) {
            echo "Usuario verificado con éxito.<br>";
        } else {
            echo "Error al verificar usuario: " . $stmt->error . "<br>";
        }
    
        $resultado = $stmt->get_result();
    
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $_SESSION['usuario'] = $fila['usuario'];
            $_SESSION['passwd'] = $fila['passwd'];
            header("Location: ../index.php");
            echo "Bienvenido, " . $_SESSION['usuario'] . "<br>";
            exit();
        } else {
            echo "Credenciales incorrectas.<br>";
        }
    
        $stmt->close();
    }
}   



?>
