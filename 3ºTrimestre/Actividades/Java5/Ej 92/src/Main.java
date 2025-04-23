import java.util.*;
import java.io.*;

public class Main {

	public static void main (String[]args) {
		
		Animal anime = new Animal("Capybara","Extinta");
		
		//Serializo
		
		try {
			ObjectOutputStream out = new ObjectOutputStream(new FileOutputStream("animal.ser"));
			out.writeObject(anime);
			out.close();
			System.out.println("Objeto guardado con éxito");
			
			//DesSerializo 
			
			ObjectInputStream in = new ObjectInputStream (new FileInputStream("animal.ser"));
			Animal animal = (Animal) in.readObject();
			in.close();
			System.out.println("Datos recuperados");
			System.out.println("Nombre ->>"+ animal.nombre);
			System.out.println("Especie ->>"+ animal.especie);
			
		}catch(IOException | ClassNotFoundException e ){
			e.printStackTrace();
		}

		

		
	}
}
