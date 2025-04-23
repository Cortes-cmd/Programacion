import java.util.*;
import java.io.*;

public class Main {

	public static void Escribir () {
		
	}
	
		public static void main (String[]args) {
			int suma= 0;
	
			
			try {
				BufferedReader lector = new BufferedReader(new FileReader("numeros.txt"));
				
				String linea;
				
				while ((linea=lector.readLine()) != null) {
					System.out.println(linea);
					int numero = Integer.parseInt(linea);
                    suma = suma + numero;
				}
				lector.close();
				System.out.println("Suma ->>"+ suma);
			
				
		}catch(IOException e){
			e.printStackTrace();
		}
	}
}