import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.*;

public class InsercionBasica {
    public static void main(String[] args) {
        String url = "jdbc:mysql://localhost:3306/club_deportivo";
        String usuario = "root";
        String contraseña = "";

        try {
            Connection conexion = DriverManager.getConnection(url, usuario, contraseña);
            Statement stmt = conexion.createStatement();
            stmt.executeUpdate("INSERT INTO socios (nombre,apellido, edad, cuota) VALUES ('Romualdo', 'Gonzales',23,255)");
            System.out.println("¡Inserción exitosa!");
            stmt.close();
            conexion.close();
        } catch (SQLException e) {
            System.out.println("Error de conexión: " + e.getMessage());
        }
    }
}

