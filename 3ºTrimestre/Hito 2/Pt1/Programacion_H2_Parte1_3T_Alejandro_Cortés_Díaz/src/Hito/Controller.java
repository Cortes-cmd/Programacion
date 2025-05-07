package Hito; // Importo el package donde se encuentran porque sin él me daba error al referenciar a Controller
import java.sql.*; // Importación de herramientas sql 

// Clase Controller que se encarga de precisar el puerto, el nombre de la db, el user, y la password de la base de datos al inicio, y crea un atributo conexion
public class Controller {

    private final String url = "jdbc:mysql://localhost:3306/cine_alejandro_cortés_díaz";
    private final String usuario = "root";
    private final String contraseña = "";

    private Connection conexion;

    // En el constructor conecto con db directamente
    public Controller() {
        try {
        	
            this. conexion = DriverManager.getConnection(url, usuario, contraseña);
            
        } catch (SQLException e) {
            System.out.println("Error al conectar a la base de datos: " + e.getMessage());
        }
    }

    // Defino el método para ver las películas almacenadas 
    public void verPeliculas() {
    	  
    	// Si la conexión falla mensaje error
        if (conexion == null) {
            System.out.println("No se pudo establecer conexión con la base de datos.");
            return;
        }
        try {
        	// Creo la sentencia sql conectada a la db, y ejecuto la Query SQL
            Statement stmt = conexion.createStatement();
            ResultSet rs = stmt.executeQuery("SELECT * FROM pelicula inner join categoria on categoria.id_categoria = pelicula.id_categoria");


            System.out.println("¡Selección exitosa!");

            //Mientras siga encontrando resultados, que los muestre
            while (rs.next()) {
                System.out.println("ID: " + rs.getInt("id_pelicula") + " Titulo: " + rs.getString("titulo")+ " Valoraciones: "+rs.getString("valoraciones")+ " ID_Categoria: "+ rs.getInt("id_categoria")+ " Fecha de extreno: "+rs.getDate("lanzamiento"));
            }
            
            //Sino, mensaje de error
        } catch (SQLException e) {
            System.out.println("Error al recuperar películas: " + e.getMessage());
        }
    }
}