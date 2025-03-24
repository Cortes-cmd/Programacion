package Paquete;

public class Persona {
	
	String nombre;
	int edad;
	
		public Persona() {
			this.nombre="Desconocido";
			this.edad=0;
			
		}
	    public Persona(String nombre) {
	        this.nombre = nombre;
	        this.edad = 0;
	    }
	    
	    public Persona(String nombre, int edad) {
	        this.nombre = nombre;
	        this.edad = edad;
	    }


		
		public void mostrarDatos() {
			
			System.out.println(nombre + edad);
	
		}

}
