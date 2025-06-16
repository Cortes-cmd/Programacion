package com.akihabara.market.dao;
import com.akihabara.market.model.ProductoOtaku;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ProductoDAO {

	

	//Atributo conexión para que sean efectivas las ejecuciones SQL
	    private Connection conexion;

	    public ProductoDAO(Connection conexion) {
	       this.conexion=conexion;;
	    }

	    //Función para agregar producto usando sentencia SQL, los sets para obtener cada dato, y posteriormente ejecuto estos con el Update()
	    public void agregarProducto(ProductoOtaku producto) {
	        String sql = "INSERT INTO producto (nombre, categoria, precio, stock) VALUES (?, ?, ?,?)";

	        try (PreparedStatement stmt = conexion.prepareStatement(sql)) {
	            stmt.setString(1, producto.getNombre());
	            stmt.setString(2, producto.getCategoria());
	            stmt.setDouble(3, producto.getPrecio());
	            stmt.setInt(4, producto.getStock());

	            stmt.executeUpdate();
	            System.out.println("Producto agregado correctamente.");
	        } catch (SQLException e) {
	            System.out.println("Error al agregar producto: " + e.getMessage());
	        }
	    }
	    
	    //Función obtener por ID que recoje id, lo combina con la sentencia SQL, prepara y ejecuta la sentencia, y recoge con un ResultSet los datos pertinentes a medida que los muestra

	    public  ProductoOtaku obtenerProductoPorId(int id) {
	    	
	        String sql = "SELECT * FROM producto WHERE id = ?";
	        ProductoOtaku producto = null;

	        try (PreparedStatement stmt = conexion.prepareStatement(sql)) {
	            stmt.setInt(1, id);
	            try (ResultSet rs = stmt.executeQuery()) {
	                if (rs.next()) {
	                    producto = new ProductoOtaku(
	                    		rs.getInt("id"),
	                            rs.getString("nombre"),
	                            rs.getString("categoria"),
	                            rs.getDouble("precio"),
	                            rs.getInt("stock")
	                    );
	                }
	            }
	        } catch (SQLException e) {
	            System.out.println("Error al obtener producto por ID: " + e.getMessage());
	        }

	        return producto;
	    }

	    // Función que aplica SQL básico que introduce los datos recogidos por el ResultSet en un Array lista que recogerá los valores deseados y posteriormente serán mostrados por consola
	    public List<ProductoOtaku> obtenerTodosLosProductos() {
	        String sql = "SELECT * FROM producto";
	        List<ProductoOtaku> lista = new ArrayList<>();

	        try (PreparedStatement stmt = conexion.prepareStatement(sql);
	             ResultSet rs = stmt.executeQuery()) {

	            while (rs.next()) {
	                ProductoOtaku producto = new ProductoOtaku(
	                		rs.getInt("id"),
	                        rs.getString("nombre"),
	                        rs.getString("categoria"),
	                        rs.getDouble("precio"),
	                        rs.getInt("stock")
	                );
	                lista.add(producto);
	            }
	        } catch (SQLException e) {
	            System.out.println("Error al obtener todos los productos: " + e.getMessage());
	        }

	        return lista;
	    }

	    //Función actualizar producto que aprovecha sentencia SQL y prepara la sentencia para asignar los datos deseados a los de las variables necesarias, que luego serán agrupadas
	    //En una ejecución de db
	    public boolean actualizarProducto(ProductoOtaku producto) {
	        String actualizarSQL = "UPDATE producto SET nombre = ?, categoria = ?, precio = ?, stock = ? WHERE id = ?";

	        try (
	            PreparedStatement stmtUpdate = conexion.prepareStatement(actualizarSQL)
	        ) {


	                // Paso 2: actualizar el producto
	                stmtUpdate.setString(1, producto.getNombre());
	                stmtUpdate.setString(2, producto.getCategoria());
	                stmtUpdate.setDouble(3, producto.getPrecio());
	                stmtUpdate.setInt(4, producto.getStock());
	                stmtUpdate.setInt(5, producto.getId());
	                
	                return stmtUpdate.executeUpdate() >0;
	            

	        } catch (SQLException e) {
	            System.out.println("Error al actualizar producto: " + e.getMessage());
	            return false;
	        }
	    }


	    //Eliminar producto a partir de un id pasado como parámetro, tenido en cuenta en la preparación de la sentencia, y devuelve filas >0 si se ha ejecutado correctamente que sería 1
	    public boolean eliminarProducto(int id) {
	        String sql = "DELETE FROM producto WHERE id = ?";

	        try (PreparedStatement stmt = conexion.prepareStatement(sql)) {
	            stmt.setInt(1, id);
	            int filas = stmt.executeUpdate();
	            return filas > 0;
	        } catch (SQLException e) {
	            System.out.println("Error al eliminar producto: " + e.getMessage());
	            return false;
	        }
	    }

	    
	    //Función que busca recibiendo nombre como parámetro, datos sobre un producto, creando un array que alojará los datos, se ejecuta preparándo la sentencia, y con el resulset se guardan 
	    public List<ProductoOtaku> buscarProductosPorNombre(String nombre) {
	        String sql = "SELECT * FROM producto WHERE nombre LIKE ?";
	        List<ProductoOtaku> lista = new ArrayList<>();

	        try (PreparedStatement stmt = conexion.prepareStatement(sql)) {
	            stmt.setString(1, "%" + nombre + "%");
	            try (ResultSet rs = stmt.executeQuery()) {
	                while (rs.next()) {
	                    ProductoOtaku producto = new ProductoOtaku(
		                		rs.getInt("id"),
	                            rs.getString("nombre"),
	                            rs.getString("categoria"),
	                            rs.getDouble("precio"),
	                            rs.getInt("stock")
	                    );
	                    lista.add(producto);
	                }
	            }
	        } catch (SQLException e) {
	            System.out.println("Error al buscar productos por nombre: " + e.getMessage());
	        }

	        return lista;
	    }

	    //Busqueda de producto por categoría por medio de sentencia SQL, y array que aloja a través de Resulset los datos de la db que corresponden con el parámetro de categoría
	    //Facilitado, tras preparar la sentencia
	    public List<ProductoOtaku> buscarProductoPorCategoria(String categoria) {
	        String sql = "SELECT * FROM producto WHERE categoria = ?";
	        List<ProductoOtaku> lista = new ArrayList<>();

	        try (PreparedStatement stmt = conexion.prepareStatement(sql)) {
	            stmt.setString(1, categoria);
	            try (ResultSet rs = stmt.executeQuery()) {
	                while (rs.next()) {
	                    ProductoOtaku producto = new ProductoOtaku(
		                		rs.getInt("id"),
	                            rs.getString("nombre"),
	                            rs.getString("categoria"),
	                            rs.getDouble("precio"),
	                            rs.getInt("stock")
	                    );
	                    lista.add(producto);
	                }
	            }
	        } catch (SQLException e) {
	            System.out.println("Error al buscar productos por categoría: " + e.getMessage());
	        }

	        return lista;
	    }
	}

