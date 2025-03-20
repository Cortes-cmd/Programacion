import java.util.Scanner;

public class Sumar{

	

	public static void main(String[] args){

	 Scanner scanner = new Scanner(System.in);

        do {

	    System.out.println("Ingresa un número y lo sumaré");		    int suma = scanner.nextInt();
		
	    numero+=suma;

            System.out.println("El número elegido es; " + numero + "De momento el resultado de la suma es;" + suma);

	    System.out.println("Deseas continuar introduciendo números? Si = cualquier número/ No = 0");

	    int detencion = scanner.nextInt();

            
        } while (detencion != 0);

    	}




	}


