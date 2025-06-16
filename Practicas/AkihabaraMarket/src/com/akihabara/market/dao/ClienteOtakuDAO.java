package com.akihabara.market.dao;

import com.akihabara.market.model.ClienteOtaku;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ClienteOtakuDAO {

	//Añado conexión para efectuarla antes de ejecutar las funciones
    private Connection conexion;

    public ClienteOtakuDAO(Connection conexion) {
        this.conexion = conexion;
    }

    //Agregar cliente con los sets, el sql con la gramática SQL, y su try catch
    public void agregarCliente(ClienteOtaku cliente) {
        String sql = "INSERT INTO clientes (dni, nombre, email, telefono, fecha_registro) VALUES (?, ?, ?, ?, ?)";

        try (PreparedStatement stmt = conexion.prepareStatement(sql)) {
            stmt.setString(1, cliente.getDni());
            stmt.setString(2, cliente.getNombre());
            stmt.setString(3, cliente.getEmail());
            stmt.setString(4, cliente.getTelefono());
            stmt.setDate(5, cliente.getFechaRegistro());

            stmt.executeUpdate();
            System.out.println("Cliente agregado correctamente.");
        } catch (SQLException e) {
            System.out.println("Error al agregar cliente: " + e.getMessage());
        }
    }

    // Función con el dni pasado por parámetro, el DNI que figura en la sentencia SQL posterior, el set del dni, y la impresión que viene dada por los gets mientras que el rs detecte nuevos datos 
    public ClienteOtaku obtenerClientePorDni(String dni) {
        String sql = "SELECT * FROM clientes WHERE dni = ?";
        ClienteOtaku cliente = null;

        try (PreparedStatement stmt = conexion.prepareStatement(sql)) {
            stmt.setString(1, dni);
            try (ResultSet rs = stmt.executeQuery()) {
                if (rs.next()) {
                    cliente = new ClienteOtaku(
                            rs.getString("dni"),
                            rs.getString("nombre"),
                            rs.getString("email"),
                            rs.getString("telefono"),
                            rs.getDate("fecha_registro"));
                    
                }
            }
        } catch (SQLException e) {
            System.out.println("Error al obtener cliente por DNI: " + e.getMessage());
        }

        return cliente;
    }

    // Creo un array list y ejecuto la sentencia sql para obtener los clientes, y añadirlo en el array, que posteriomente mostraría
    public List<ClienteOtaku> obtenerTodosLosClientes() {
        String sql = "SELECT * FROM clientes";
        List<ClienteOtaku> lista = new ArrayList<>();

        try (PreparedStatement stmt = conexion.prepareStatement(sql);
             ResultSet rs = stmt.executeQuery()) {

            while (rs.next()) {
                ClienteOtaku cliente = new ClienteOtaku(
                        rs.getString("dni"),
                        rs.getString("nombre"),
                        rs.getString("email"),
                        rs.getString("telefono"),
                        rs.getDate("fecha_registro")
                );
                lista.add(cliente);
            }
        } catch (SQLException e) {
            System.out.println("Error al obtener todos los clientes: " + e.getMessage());
        }

        return lista;
    }
    
    
    // Función con la sentencia SQL, los sets que encajan las variables introducidas como parámetros a modo de objeto ClienteOtaku (con trycatch correspondiente)
    public boolean actualizarCliente(ClienteOtaku cliente) {
        String sql = "UPDATE clientes SET nombre = ?, email = ?, telefono = ?, fecha_registro = ? WHERE dni = ?";

        try (PreparedStatement stmt = conexion.prepareStatement(sql)) {
            stmt.setString(1, cliente.getNombre());
            stmt.setString(2, cliente.getEmail());
            stmt.setString(3, cliente.getTelefono());
            stmt.setDate(4, (cliente.getFechaRegistro()));
            stmt.setString(5, cliente.getDni());

            return stmt.executeUpdate() > 0;
        } catch (SQLException e) {
            System.out.println("Error al actualizar cliente: " + e.getMessage());
            return false;
        }
    }

    
    // Eliminar cliente con sentencia SQL alojada en una variable que será preparada y devuelta ejecutada, con su trycatch correspondiente
    public boolean eliminarCliente(String dni) {
        String sql = "DELETE FROM clientes WHERE dni = ?";

        try (PreparedStatement stmt = conexion.prepareStatement(sql)) {
            stmt.setString(1, dni);
            return stmt.executeUpdate() > 0;
        } catch (SQLException e) {
            System.out.println("Error al eliminar cliente: " + e.getMessage());
            return false;
        }
    }


}














