public class Comparador{

	public static void main (String[] args){

	Comparador comparer = new Comparador();

	comparer.compararNumeros(2,4);
	
	}

	public void compararNumeros(int a, int b){

		if (a>b){

	System.out.println(a +" es mayor que "+ b);

		}else if (a<b){
	System.out.println(a + " es menor que " + b);
		}else if (a==b){
	System.out.println(a + " es igual que " + b);
	}
	
	
	
	}

}