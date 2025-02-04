<?php
require_once '../config/conexion.php';

class Socio {
    private $conexion;
    // Primero creo un objeto de la clase Conexion para poder conectar a la base de datos
    public function __construct() {
        $this->conexion = new Conexion();
    }
    // Función para agregar un cliente a través de sentencia SQL preparada
    public function AgregarCliente($nombre, $apellidos, $email, $edad, $PlanBase, $PaquetesAdicionales, $Duracion) {
        $query = "INSERT INTO Clientes (nombre, apellidos, email, edad) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $nombre, $apellidos, $email, $edad);
        
        // Verificar si se ha ejecutado la sentencia SQL
        if ($stmt->execute()) {
            echo "Socio agregado con éxito.";
        } else {
            echo "Error al agregar socio: " . $stmt->error;
            return;
        }

        // Obtengo ID del cliente para insertar en la base de datos Planes
        $id_cliente = $this->conexion->conexion->insert_id;

        // Asegurarse de que no haya una coma al final de PaquetesAdicionales
        $PaquetesAdicionales = rtrim($PaquetesAdicionales, ',');

        $query = "INSERT INTO Planes (id_cliente, PlanBase, PaquetesAdicionales, Duracion) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("isss", $id_cliente, $PlanBase, $PaquetesAdicionales, $Duracion);

        // Verificar si se ha ejecutado la sentencia SQL
        if ($stmt->execute()) {
            echo "Socio agregado con éxito.";
        } else {
            echo "Error al agregar socio: " . $stmt->error;
        }

        // Cierro la sentencia SQL una vez utilizada
        $stmt->close();
    }
    // Función para obtener los clientes directamente de la base de datos a través de una sentencia SQL
    public function ObtenerClientes() {
        $query = "SELECT * FROM Clientes INNER JOIN Planes ON clientes.id_cliente = Planes.id_cliente";
        $resultado = $this->conexion->conexion->query($query);
        $socios = [];
        // Recorro los resultados de la consulta sql, y los guardo en un array
        while ($fila = $resultado->fetch_assoc()) {
            $socios[] = $fila;
    
            // Obtengo los datos del cliente desde $fila
            $nombre = $fila['nombre'];
            $apellidos = $fila['apellidos'];
            $email = $fila['email'];
            $edad = $fila['edad'];
            $plan_base = $fila['PlanBase'];
            $paquetes = $fila['PaquetesAdicionales'];
            $duracion = $fila['Duracion'];
    
            // Creo el contenido del cliente para guardar en el archivo, esto me sirvió para probar que los datos se guardaban correctamente. Tiene
            // Muchas inserciones porque hubo bastantes errores al inicio de la construcción de la base de datos.
            $cliente_info = "Nombre: $nombre $apellidos\nEmail: $email\nEdad: $edad\nPlan: $plan_base\nPaquete(s): $paquetes\nDuración: $duracion\n\n";
    
            // Abrir el archivo para escribir (añadir al final si ya existe)
            $archivo = fopen("clientes_registrados.txt", "a");
    
            if ($archivo) {
                fwrite($archivo, $cliente_info); // Escribo los datos del cliente en el archivo
                fclose($archivo); // Cierro el archivo
            } else {
                echo "No se pudo abrir el archivo para guardar los datos del cliente.";
            }
        }
        // Devuelvo el array con los clientes
        return $socios;
    }
    
    // Función para actualizar los clientes a través de sentencia SQL preparada, esto se usará para editar clientes
    public function ActualizarClientes($id_cliente, $nombre, $apellido, $email,$edad, $plan_base, $paquetes, $duracion) {
        $query = "UPDATE Clientes SET nombre = ?, apellidos = ?, email = ?, edad = ? WHERE id_cliente = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssssi", $nombre, $apellido, $email, $edad,  $id_cliente);
        // Verificar si se ha ejecutado la sentencia SQL
        if ($stmt->execute()) {
            echo "Socio actualizado con éxito.";
        } else {
            echo "Error al actualizar socio: " . $stmt->error;
        }
        // Realizo la modificación también en la tabla Planes
        $query = "UPDATE Planes SET PlanBase = ?, PaquetesAdicionales = ?, Duracion = ? WHERE id_cliente = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $plan_base, $paquetes, $duracion,$id_cliente);
        // Verificar si se ha ejecutado la sentencia SQL
        if ($stmt->execute()) {
            echo "Socio actualizado con éxito.";
        } else {
            echo "Error al actualizar socio: " . $stmt->error;
        }
        // Cierro la sentencia SQL una vez utilizada
        $stmt->close();
    }
    // Función para eliminar a un cliente a través de sentencia SQL preparada
    public function EliminarCliente($id_cliente) {
        // Inicio una transacción para eliminar al cliente de ambas tablas
        $this->conexion->conexion->begin_transaction();
    
        try {
            // Elimino al cliente de la tabla Planes por medio del id a través de SQL preparado
            $query = "DELETE FROM Planes WHERE id_cliente = ?";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("i", $id_cliente);
            // Verificar si se ha ejecutado la sentencia SQL
            if ($stmt->execute()) {
                echo "Socio eliminado con éxito de la tabla Planes (ID: $id_cliente).<br>";
            } else {
                throw new Exception("Error al eliminar socio de Planes (ID: $id_cliente): " . $stmt->error);
            }
    
            // Hago el mismo proceso para eliminar al cliente de la tabla Clientes
            $query = "DELETE FROM Clientes WHERE id_cliente = ?";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("i", $id_cliente);
            // Verificar si se ha ejecutado la sentencia SQL
            if ($stmt->execute()) {
                echo "Socio eliminado con éxito de la tabla Clientes (ID: $id_cliente).<br>";
            } else {
                throw new Exception("Error al eliminar socio de Clientes (ID: $id_cliente): " . $stmt->error);
            }
    
            // Confirmo la transacción si todo ha ido bien
            $this->conexion->conexion->commit();
            // Si hay un error, muestro el mensaje y rehago la transacción para no hacer cambios a medias
        } catch (Exception $e) { 
            $this->conexion->conexion->rollback();
            echo $e->getMessage() . "<br>";
            // Cierro la sentencia SQL una vez utilizada
        } finally { 
            $stmt->close();
        }
    }
}
?>
