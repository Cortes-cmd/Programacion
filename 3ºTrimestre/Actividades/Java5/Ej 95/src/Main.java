import java.util.*;
import java.io.*;
public class Main {

	ArrayList <Empleado> empleados = new ArrayList<>();

	public static  void main (String[] args) {
		
	Main main =new Main();
	
	main.menu();
	
	}
	
	public void menu() {
		try {
			
			Scanner sc = new Scanner(System.in);

			int opcion;
			
			do { 
				
				System.out.println("Posibles elecciones; \n ----------------------------------------------------------------------------");
				
				System.out.println("1 - Agregar empleado \n 2 - Mostrar empleados \n - 3 Salir ");
				
				 opcion = sc.nextInt();
				
					switch(opcion) {
					
					case 1:
						
						agregarEmpleado();
						
							break;
							
					case 2:
						
						mostrarEmpleado();
						
						break;
				
					case 3:
						
						System.out.println("Saliendo del programa...");
						break;
					default:
						System.out.println("No es opcion válida");
					}
					System.out.println("La elección anterior fue "+opcion);
			} while (opcion !=3);
			
			
			
		}catch(Exception e) {
			System.out.println("Se ha encontrado una excepción "+e);
		}
	}
	public void agregarEmpleado() {
		
		try {
			
			
			Scanner sc = new Scanner(System.in);

			System.out.println("Ingresa el nombre del empleado");
			String nombre = sc.nextLine();
			
			System.out.println("Ingresa la edad del empleado");
			int edad = sc.nextInt();
			
			System.out.println("Ingresa el salario del empleado");
			int salario = sc.nextInt();
			
			empleados.add(new Empleado(nombre,edad,salario));
			
			ObjectOutputStream out = new ObjectOutputStream(new FileOutputStream("empleado.ser"));
			out.writeObject(empleados);
			out.close();
			
			System.out.println("Objeto guardado con éxito");
			

		} catch(IOException e) {
			System.out.println("Excepcion"+e);

		}


		
		}
	
	public void mostrarEmpleado() {
		
		try {
			
			ObjectInputStream in = new ObjectInputStream (new FileInputStream("empleado.ser"));
			ArrayList<Empleado> empleados = (ArrayList<Empleado>) in.readObject();
			
			for (Empleado empleado : empleados) {
				System.out.println("Datos recuperados");
				System.out.println("Nombre ->>"+ empleado.nombre);
				System.out.println("Especie ->>"+ empleado.edad);
				System.out.println("Especie ->>"+ empleado.salario);
			}

			 
			in.close();
			
		} catch(IOException e ) {
			System.out.println("Excepcion"+e);


		}catch(ClassNotFoundException e ) {
			e.printStackTrace();
		}
		
	}
}
