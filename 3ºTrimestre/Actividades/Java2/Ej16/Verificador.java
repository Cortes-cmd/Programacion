public class Verificador{

	public static void main (String[] args){
	
	Verificador autenticar = new Verificador();

	System.out.println("El número es mayor que 10 y par?; "+ autenticar.esMayorYPar(12));

	}
	
	public boolean esMayorYPar(int numero){
	
	if (numero >10 && numero%2==0){
	
	return true;

	} else{

	return false;
	}

	}


}