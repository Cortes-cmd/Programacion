public class AreaCuadrado{


	public static void main (String[] args){


	AreaCuadrado A = new AreaCuadrado();
	System.out.println("El area es;  "+ A.calcularArea(2));


	}


	public int calcularArea (int lado){

		return lado * lado;

	}


}