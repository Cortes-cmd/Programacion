package Paquete;

public class main {

	
	public static void main (String[] args) {
		
		Persona pers1 = new Persona();
		Persona pers2 = new Persona("Pacu");
		Persona pers3 = new Persona("Luca",24);
		
		pers1.mostrarDatos();
		pers2.mostrarDatos();
		pers3.mostrarDatos();
		
		
	}
}
