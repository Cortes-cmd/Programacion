import java.util.Scanner;

public class Sumar{

	

	public static void main(String[] args){

	 Scanner scanner = new Scanner(System.in);
	
	int suma=0;
	int numero;
	

        do {

	    System.out.println("Ingresa un número y lo sumaré , Deseas Salir? Si = escribe 0");		    
	numero = scanner.nextInt();
		
	    suma+=numero;

            System.out.println("El número elegido es; " + numero + "De momento el resultado de la suma es;" + suma);

	    
            
        } while (numero != 0);

    	}




	}


