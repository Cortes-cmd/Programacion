package Pack;

public class Main {

	public static void main (String[]args) {
		
		Lavadora Lav = new Lavadora(350.02);
		Televisor Tev = new Televisor(152.78);
		
		System.out.println(Lav.mostrarDatos()) ;
		System.out.println(Tev.mostrarDatos()) ;
	}
}
