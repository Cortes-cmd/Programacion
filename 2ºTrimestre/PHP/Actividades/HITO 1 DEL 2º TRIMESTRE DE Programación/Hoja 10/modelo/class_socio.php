<?php
require_once '../config/conexion.php';

class Socio {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function AgregarCliente( $nombre, $apellidos, $email, $edad,$plan_base, $paquetes, $duracion) {
        $query = "INSERT INTO Clientes (nombre, apellidos, email, edad) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $nombre, $apellidos, $email, $edad);

        if ($stmt->execute()) {
            echo "Socio agregado con éxito.";
        } else {
            echo "Error al agregar socio: " . $stmt->error;
        }

        // Obtener ID del cliente para insertar en la base de datos plan
        $query = "SELECT id_Cliente FROM Clientes WHERE email=?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $correo);  
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        if ($fila = $resultado->fetch_assoc()) {
            $id_guardado = $fila['id_Cliente'];
        } else {
            echo "Error al obtener el ID del cliente.";
            return;
        }
        $query = "INSERT INTO Planes (id_Cliente,plan_base, paquetes, duracion) VALUES (?, ?, ?,?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("isss", $id_guardado, $plan_base, $paquetes, $duracion);

        

        if ($stmt->execute()) {
            echo "Socio agregado con éxito.";
        } else {
            echo "Error al agregar socio: " . $stmt->error;
        }


        $stmt->close();
    }

    public function ObtenerClientes() {
        $query = "SELECT * FROM Clientes INNER JOIN Planes ON clientes.id_cliente = Planes.id_cliente";
        $resultado = $this->conexion->conexion->query($query);
        $socios = [];
        
        while ($fila = $resultado->fetch_assoc()) {
            $socios[] = $fila;
    
            // Obtener los datos del cliente desde $fila
            $nombre = $fila['nombre'];
            $apellidos = $fila['apellidos'];
            $email = $fila['email'];
            $edad = $fila['edad'];
            $plan_base = $fila['PlanBase'];
            $paquetes = $fila['PaquetesAdicionales'];
            $duracion = $fila['Duracion'];
    
            // Crear el contenido del cliente para guardar en el archivo
            $cliente_info = "Nombre: $nombre $apellidos\nEmail: $email\nEdad: $edad\nPlan: $plan_base\nPaquete(s): $paquetes\nDuración: $duracion\n\n";
    
            // Abrir el archivo para escribir (añadir al final si ya existe)
            $archivo = fopen("clientes_registrados.txt", "a");
    
            if ($archivo) {
                fwrite($archivo, $cliente_info); // Escribir los datos del cliente en el archivo
                fclose($archivo); // Cerrar el archivo
            } else {
                echo "No se pudo abrir el archivo para guardar los datos del cliente.";
            }
        }
    
        return $socios;
    }
    

    public function ActualizarClientes($id_cliente, $nombre, $apellido, $email,$edad, $plan_base, $paquetes, $duracion) {
        $query = "UPDATE Clientes SET nombre = ?, apellidos = ?, email = ?, edad = ? WHERE id_cliente = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssssi", $nombre, $apellido, $email, $edad,  $id_cliente);

        if ($stmt->execute()) {
            echo "Socio actualizado con éxito.";
        } else {
            echo "Error al actualizar socio: " . $stmt->error;
        }

        $query = "UPDATE Planes SET PlanBase = ?, PaquetesAdicionales = ?, Duracion = ? WHERE id_cliente = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $plan_base, $paquetes, $duracion,$id_cliente);

        if ($stmt->execute()) {
            echo "Socio actualizado con éxito.";
        } else {
            echo "Error al actualizar socio: " . $stmt->error;
        }
        $stmt->close();
    }

    public function EliminarCliente ($id_cliente) {
        $query = "DELETE FROM Planes WHERE id_cliente = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_cliente);

        if ($stmt->execute()) {
            echo "Socio eliminado con éxito.";
        } else {
            echo "Error al eliminar socio: " . $stmt->error;
        }

        $query = "DELETE FROM Clientes WHERE id_cliente = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_cliente);

        if ($stmt->execute()) {
            echo "Socio eliminado con éxito.";
        } else {
            echo "Error al eliminar socio: " . $stmt->error;
        }


        $stmt->close();
    }
}
?>
