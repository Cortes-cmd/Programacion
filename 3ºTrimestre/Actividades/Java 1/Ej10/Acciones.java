public class Acciones{


	public static void main (String[]args){

	Acciones faction = new Acciones();
	faction.pasoDos();


	}

	

	public void pasoUno(){

	System.out.println("Ejecutando paso 1");


	}


	public void pasoDos(){

	Acciones accion = new Acciones();
	accion.pasoUno();

	System.out.println("Ejecutando paso 2");
	
	}










}