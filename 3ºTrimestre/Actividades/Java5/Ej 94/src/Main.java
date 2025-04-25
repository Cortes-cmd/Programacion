import java.io.BufferedReader;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Scanner;

public class Main {

	public static void main (String[] args) {
		
		Scanner sc = new Scanner (System.in);

	
	
			while (true) {
				
				try {
					System.out.println("Por aqui paso");
					String archive = sc.nextLine();
					
					FileWriter mensaje = new FileWriter(archive+".txt");
					mensaje.write("ey");
					mensaje.close();
					System.out.println("Frase guardada exitosamente");
					if (mensaje == null) {
						BufferedReader lector = new BufferedReader(new FileReader(archive+".txt"));
						
						String linea;
						
						while((linea =lector.readLine())!=null ) {
							System.out.println(linea);
						}
					}
				} catch(IOException e) {
					
				}
				
				
			}
			


	}
}
