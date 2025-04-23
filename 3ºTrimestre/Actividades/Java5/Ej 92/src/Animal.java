import java.util.*;
import java.io.*;

class Animal  implements Serializable {

	String nombre;
	String especie;
	
	public Animal (String nombre, String especie) {
	
		this.nombre = nombre;
		this.especie = especie;
	}
}
