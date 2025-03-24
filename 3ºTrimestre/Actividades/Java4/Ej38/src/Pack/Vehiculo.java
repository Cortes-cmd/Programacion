package Pack;

public class Vehiculo {
	String marca;
	String modelo;
	
	public Vehiculo(String marca, String modelo) {
		
		this.marca=marca;
		this.modelo=modelo;
		
	}
	public void describir() {
		System.out.println("Soy un coche de marca"+ marca+ "y modelo"+modelo);
		
	}
}
