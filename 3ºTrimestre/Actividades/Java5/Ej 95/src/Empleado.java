import java.io.Serializable;

public class Empleado implements Serializable {

	String nombre;
	int edad;
	int salario;

	public Empleado(String nombre, int edad, int salario) {
		
		this.nombre = nombre;
		this.edad = edad;
		this.salario = salario;
		
	}
}
