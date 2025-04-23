import java.util.*;
import java.io.*;

public class Main {

	
	public  static void main (String[] args) {
		
		try {
			
			Scanner sc = new Scanner(System.in);

			System.out.println("Introduce la frase");
			
			String frase = sc.nextLine();
					
			FileWriter mensaje = new FileWriter("mensaje.txt");
			mensaje.write(frase);
			mensaje.close();
			System.out.println("Frase guardada exitosamente");
			
		} catch(IOException e) {
			e.printStackTrace();
		}
	}
}
