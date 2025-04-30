import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.*;

public class UpdateBasico {
    public static void main(String[] args) {
        String url = "jdbc:mysql://localhost:3306/club_deportivo";
        String usuario = "root";
        String contraseña = "";

        try {
            Connection conexion = DriverManager.getConnection(url, usuario, contraseña);
            String sql = ("UPDATE socios SET cuota = ? WHERE nombre = ?" );
            PreparedStatement pstmt = conexion.prepareStatement(sql);
            pstmt.setDouble( 1,699.99);
            pstmt.setString(2,"Romualdo");
            
            System.out.println("Éxito");
            
            pstmt.executeUpdate();

            pstmt.close();
            conexion.close();
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }
}
