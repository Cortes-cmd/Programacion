import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.*;

public class SeleccionBasica {
    public static void main(String[] args) {
        String url = "jdbc:mysql://localhost:3306/club_deportivo";
        String usuario = "root";
        String contraseña = "";

        try {
            Connection conexion = DriverManager.getConnection(url, usuario, contraseña);
            Statement stmt = conexion.createStatement();
            ResultSet rs = stmt.executeQuery("SELECT * FROM socios");
            System.out.println("¡Seleccion  exitosa!");
            
            while (rs.next()) {
                System.out.println("ID: " + rs.getInt("id") + " Nombre: " + rs.getString("nombre")+ " Apellido: "+rs.getString("apellido")+ " Edad: "+ rs.getInt("edad")+ " Cuota: "+rs.getInt("cuota"));
            }

            stmt.close();
            conexion.close();
        } catch (SQLException e) {
            System.out.println("Error de selección: " + e.getMessage());
        }
    }
}