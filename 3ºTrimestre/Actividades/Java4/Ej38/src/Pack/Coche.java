package Pack;

public class Coche  extends Vehiculo {
	
	int puertas;

	
	public Coche(String marca, String modelo, int puertas) {
		
		super(marca, modelo);
		this.puertas=puertas;
		
	}
	
	public void mostrarDatos() {
		
		System.out.println(marca + modelo + puertas);
	}
}
