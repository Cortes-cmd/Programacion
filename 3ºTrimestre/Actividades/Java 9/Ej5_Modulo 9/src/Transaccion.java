import java.sql.*;

public class Transaccion {
    public static void main(String[] args) {
        String url = "jdbc:mysql://localhost:3306/club_deportivo";
        String usuario = "root";
        String contraseña = "";

        try {
        	
            Connection conexion = DriverManager.getConnection(url, usuario, contraseña);
            conexion.setAutoCommit(false);

            Statement stmt = conexion.createStatement();
           String sql=("UPDATE socios SET cuota = cuota - ? WHERE id = ?");
           PreparedStatement pstmt = conexion.prepareStatement(sql);
           pstmt.setDouble(1,525.89);
           pstmt.setInt(2, 1);
           pstmt.executeUpdate();
           System.out.println("Actualización completada");
           
           String Sql=("UPDATE socios SET cuota = cuota + ?  WHERE id = ?");
           PreparedStatement Pstmt = conexion.prepareStatement(Sql);
           Pstmt.setDouble(2,12.89);
           pstmt.setInt(2, 2);
           Pstmt.executeUpdate();
           System.out.println("Actualización completada");

           pstmt.close();
           Pstmt.close();
          
            conexion.commit();
            System.out.println("Transacción completada exitosamente.");

            stmt.close();
            conexion.close();
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
            if (conexion != null) {
            try {
                System.out.println("Revirtiendo cambios...");
                conexion.rollback();
            } catch (SQLException ex) {
                System.out.println("Error durante rollback: " + ex.getMessage());
            }
            }
        }
    }
}



