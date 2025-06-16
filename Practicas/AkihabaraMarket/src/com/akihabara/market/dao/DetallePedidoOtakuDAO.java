package com.akihabara.market.dao;

import com.akihabara.market.model.DetallePedidoOtaku;
import com.akihabara.market.model.ProductoOtaku;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class DetallePedidoOtakuDAO {

	//Atributo conexión para que puedan ejecutarse las funciones de la db
    private Connection conexion;

    public DetallePedidoOtakuDAO(Connection conexion) {
        this.conexion = conexion;
    }

    //Función que recibe una linea SQL con los datos de detalle_pedido y producto para una inserción en la db que cumpla con los campos necesarios para la inserción, un set del idPedido
   // Y posteriormente obtengo con el ResulSet los datos desde la base de datos 
    public List<DetallePedidoOtaku> obtenerDetallesPorPedido(int idPedido) throws SQLException {
        List<DetallePedidoOtaku> detalles = new ArrayList<>();
        String sql = "SELECT dp.id_detalle, dp.id_pedido, dp.id_producto, p.nombre, dp.cantidad, dp.precio " +
                     "FROM detalle_pedido dp " +
                     "JOIN producto p ON dp.id_producto = p.id " +
                     "WHERE dp.id_pedido = ?";

        try (PreparedStatement stmt = conexion.prepareStatement(sql)) {
            stmt.setInt(1, idPedido);
            try (ResultSet rs = stmt.executeQuery()) {
                while (rs.next()) {
                    DetallePedidoOtaku detalle = new DetallePedidoOtaku();
                    ProductoOtaku producto = new ProductoOtaku();
                    detalle.setIdDetalle(rs.getInt("id_detalle"));
                    detalle.setIdPedido(rs.getInt("id_pedido"));
                    detalle.setIdProducto(rs.getInt("id_producto"));
                    producto.setNombre(rs.getString("nombre"));  // si tienes este atributo para mostrar nombre producto
                    detalle.setCantidad(rs.getInt("cantidad"));
                    detalle.setPrecio(rs.getDouble("precio"));

                    detalles.add(detalle);
                }
            }
        }

        return detalles;
    }
}
