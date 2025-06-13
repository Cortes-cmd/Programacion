//Muestro el paquete al que pertenece el archivo
package com.akihabara.market.dao;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DatabaseConnection {

    // Creo las constantes que alojaran los datos de interés para la conexión con base de datos
    private static final String DB_URL = "jdbc:mysql://localhost:3306/akihabara_db";
    private static final String USER = "userAkihabara";
    private static final String PASSWORD = "curso";

    // Variable conexion de Connection
    private Connection conexion;

    //  Constructor para introducir los datos de las constantes y crear conexión con la db
    public DatabaseConnection() {
        try {
        	// En la variable conexión introduzco los datos de constantes necesarios para la conexión
            conexion = DriverManager.getConnection(DB_URL, USER, PASSWORD);
            System.out.println("Se  estableció con éxito la conexión a la base de datos.");

            //Catch para recoger posible SQL error 
        } catch (SQLException e) {
            System.out.println("Error al conectar con la base de datos: " + e.getMessage());
        }
    }

    //  Métodos para obtener conexión a la db y para cerrarla

    // Devuelve la variable conexión que tiene los datos resueltos para conectar con db
    public Connection getConexion() {
        return conexion;
    }

    //Comprueba si no está cerrada la conexión y no es null el valor, en cuyo caso la cierra
    public void closeConexion() {
        try {
            if (conexion != null && !conexion.isClosed()) {
                conexion.close();
                System.out.println("Se ha cerrado la conexión con la base de datos.");
            }
            //Si sucede algún error en el proceso...
        } catch (SQLException e) {
            System.out.println("Error al cerrar la conexión: " + e.getMessage());
        }
    }
}


