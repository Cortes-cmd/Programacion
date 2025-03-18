

public class Usuario{

private String nombre = "Lloao";

	public static void main (String[]args){

	Usuario user = new Usuario();
	
	user.setNombre("Boricua");

	user.getNombre();

	}


	//Metodo setNombre(String nuevoNombre)
	public void setNombre(String nuevoNombre){

	System.out.println ("Hola, " + nombre+"!");

	nombre = nuevoNombre;

	

	}


	public void getNombre(){
	
	System.out.println("Hola, " + nombre + "!" );


	}

}