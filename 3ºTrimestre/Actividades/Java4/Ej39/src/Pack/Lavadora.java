package Pack;

public class Lavadora extends Electrodomestico {
	double capacidadKg;
	
	public Lavadora(double capacidadKg) {
		this.capacidadKg=capacidadKg;
	}
	public double mostrarDatos() {
		return capacidadKg;
	}
}
