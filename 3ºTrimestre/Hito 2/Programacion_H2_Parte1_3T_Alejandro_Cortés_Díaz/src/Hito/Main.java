package Hito; // Importo el package donde se encuentran porque sin él me daba error al referenciar a Controller
import java.sql.*; // Importación de herramientas sql 
import java.util.*;

public class Main {
	
	// Creo instancia de Controller para usar sus métodos
	Controller controller = new Controller();
// Creo instancia de scanner para insertar datos por consola
	Scanner scanner = new Scanner (System.in);
	
	
	// Instancia de la clase Main para utilizar el método menú
	public static void main (String[]args) {
		 Main hito = new Main();
		  hito.menu();
		  
		 }
	

// En el menú doy las opciones posibles para ver películas via SQL y salir del programa
	public void menu() {
	    int opcion = 0;
	    
	    //Con el do al menos una vez que ejecute el código para mostrar menú
	    do {
	        try {
	            System.out.println("---MENU--- \n1- Ver Películas\n2- Salir ");
	            
	            //Instancia de scanner para escribir en consola 
	            opcion = Integer.parseInt(scanner.nextLine());
	            
	            switch(opcion) {
	            
	            // según la opción ingresada se usa la función o se sale del programa
	                case 1:
	                    controller.verPeliculas();
	                    break;
	                case 2:
	                    System.out.println("Saliendo del programa...");
	                    
	                    break;
	                    
	                    
	                    //Valor por defecto si se introduce algo no registrado
	                    
	               default:
	                    System.out.println("Selecciona una opcion válida del menu");
	            }
	            
	            // Registro de error
	            } catch (NumberFormatException e) {
	                System.out.println("Por favor ingresa un número válido");
	            }
	        //Mientras que la opción elegida no sea dos, que sería para salir del programa
	        } while(opcion != 2);
	    }
	 
}




