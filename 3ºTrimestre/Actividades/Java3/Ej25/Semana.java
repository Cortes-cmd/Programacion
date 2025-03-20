import java.util.Scanner;

public class Semana {
    public static void main(String[] args) {
                
	Scanner scanner = new Scanner (System.in);
	
System.out.println("Ingresa un número, lo asociaré a un día de la semana");

	int numero = scanner.nextInt();

        switch (numero) {
            case 1:
                System.out.println("Lunes");
                break;
            case 2:
                System.out.println("Martes");
                break;
            case 3:
                System.out.println("Miércoles");
                break;
            case 4:
                System.out.println("Jueves");
                break;
            case 5:
                System.out.println("Viernes");
                break;
            default:
                System.out.println("PO ESE NO ME GUSTA");
        }
    }
}
