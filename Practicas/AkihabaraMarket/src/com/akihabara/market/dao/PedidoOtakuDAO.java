package com.akihabara.market.dao;

import com.akihabara.market.model.PedidoOtaku;
import com.akihabara.market.model.DetallePedidoOtaku;


import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class PedidoOtakuDAO {

	//Atributo conexión para que se efectúen las funciones
    private Connection conexion;

    public PedidoOtakuDAO(Connection conexion) {
        this.conexion = conexion;
    }

    //Función con la sentencia SQL tanto en pedido como detalle para que encajen los datos, con los sets recojo los valores de cada una de las variables, si se encuentra el pedido en cuestión
    // A partir de igualar a -1 la variable idPedido, entonces pasamos el Resulset por encima para extraer los datos y mostrarlos 
    public int registrarPedidoConDetalles(PedidoOtaku pedido) throws SQLException {
        String sqlPedido = "INSERT INTO pedido (dni_cliente, fecha) VALUES (?, ?)";
        String sqlDetalle = "INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, precio) VALUES (?, ?, ?, ?)";

        try (
            PreparedStatement stmtPedido = conexion.prepareStatement(sqlPedido, Statement.RETURN_GENERATED_KEYS);
            PreparedStatement stmtDetalle = conexion.prepareStatement(sqlDetalle)
        ) {
            conexion.setAutoCommit(false);

            stmtPedido.setString(1, pedido.getDniCliente());
            stmtPedido.setDate(2, pedido.getFecha());
            stmtPedido.executeUpdate();

            ResultSet rs = stmtPedido.getGeneratedKeys();
            int idPedido = -1;
            if (rs.next()) idPedido = rs.getInt(1);

            for (DetallePedidoOtaku detalle : pedido.getDetalles()) {
                stmtDetalle.setInt(1, idPedido);
                stmtDetalle.setInt(2, detalle.getIdProducto());
                stmtDetalle.setInt(3, detalle.getCantidad());
                stmtDetalle.setDouble(4, detalle.getPrecio());
                stmtDetalle.executeUpdate();
            }

            conexion.commit();
            return idPedido;
        } catch (SQLException ex) {
            conexion.rollback();
            throw ex;
        } finally {
            conexion.setAutoCommit(true);
        }
    }

    // Creo array, ejecuto la sentencia correspondiente SQL, obtengo los datos con los sets, y los derivo al array mencionado, que posteriormente expongo con los datos ordenados
    public List<PedidoOtaku> obtenerPedidosPorCliente(String dniCliente) throws SQLException {
        List<PedidoOtaku> pedidos = new ArrayList<>();
        String sql = "SELECT * FROM pedido WHERE dni_cliente = ?";

        try (PreparedStatement stmt = conexion.prepareStatement(sql)) {
            stmt.setString(1, dniCliente);
            ResultSet rs = stmt.executeQuery();

            while (rs.next()) {
                PedidoOtaku pedido = new PedidoOtaku();
                pedido.setIdPedido(rs.getInt("id_pedido"));
                pedido.setDniCliente(rs.getString("dni_cliente"));
                pedido.setFecha(rs.getDate("fecha"));
                pedidos.add(pedido);
            }
        }
        return pedidos;
    }

    //Sentencia SQL que obtiene el id pedido y muestra los datos relacionados, aprovechando Resultset para sacar los datos, e igualandoa  null una variable que contiene un objeto
    //PedidoOtaku cuando se dispone a obtener datos de la db, a modo de verificación de que ha funcionado correctamente el método, y por tanto se la llama para ejecutarla
    public PedidoOtaku obtenerPedidoCompleto(int idPedido) throws SQLException {
    	
    	PedidoOtaku pedido = null;
        String sqlPedido = "SELECT * FROM pedido WHERE id_pedido = ?";

        try (PreparedStatement stmt = conexion.prepareStatement(sqlPedido)) {
            stmt.setInt(1, idPedido);
            ResultSet rs = stmt.executeQuery();
            if (rs.next()) {
                pedido = new PedidoOtaku();
                pedido.setIdPedido(rs.getInt("id_pedido"));
                pedido.setDniCliente(rs.getString("dni_cliente"));
                pedido.setFecha(rs.getDate("fecha"));
            }
        }

        if (pedido != null) {
            DetallePedidoOtakuDAO detalleDAO = new DetallePedidoOtakuDAO(conexion);
            pedido.setDetalles(detalleDAO.obtenerDetallesPorPedido(idPedido));
        }

        return pedido;
    }

    //Función para eliminar un pedido obteniendo el id del mismo, han de ser dos tablas para no generar incongruencias, se ejecutan ambos statements preparados, y se ejecuta.
    public void eliminarPedido(int idPedido) throws SQLException {
        String sqlDetalle = "DELETE FROM detalle_pedido WHERE id_pedido = ?";
        String sqlPedido = "DELETE FROM pedido WHERE id_pedido = ?";

        try (
            PreparedStatement stmtDetalle = conexion.prepareStatement(sqlDetalle);
            PreparedStatement stmtPedido = conexion.prepareStatement(sqlPedido)
        ) {
            conexion.setAutoCommit(false);

            stmtDetalle.setInt(1, idPedido);
            stmtDetalle.executeUpdate();

            stmtPedido.setInt(1, idPedido);
            stmtPedido.executeUpdate();

            conexion.commit();
        } catch (SQLException ex) {
            conexion.rollback();
            throw ex;
        } finally {
            conexion.setAutoCommit(true);
        }
    }
}