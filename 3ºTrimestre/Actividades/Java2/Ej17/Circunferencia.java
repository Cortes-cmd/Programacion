public class Circunferencia{

final double PI = 3.1416;

	public static void main (String[] args){

		Circunferencia circular = new Circunferencia();

		System.out.println("La circunferencia es: "+ circular.calcularCircunferencia(4) );
	}

	public  double calcularCircunferencia(double radio){
	
	return 2 * PI * radio;

	}

}