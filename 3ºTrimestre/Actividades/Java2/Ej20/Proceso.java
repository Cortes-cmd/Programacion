public class Proceso{

	
	public static void main (String[]args){

	Proceso procex = new Proceso();
	procex.pasoDos();	

	}


	public void pasoUno(){

	System.out.println("Iniciando proceso...");

	}

	public void pasoDos(){

	Proceso process = new Proceso();
	process.pasoUno();

	System.out.println("Proceso completado");
	
	}


}