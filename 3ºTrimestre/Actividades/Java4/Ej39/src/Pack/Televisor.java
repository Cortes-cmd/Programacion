package Pack;

public class Televisor extends Electrodomestico{
	double pulgadas;
	
	public Televisor(double pulgadas) {
		this.pulgadas=pulgadas;
	}
	public double mostrarDatos() {
		return pulgadas;
	}
}
