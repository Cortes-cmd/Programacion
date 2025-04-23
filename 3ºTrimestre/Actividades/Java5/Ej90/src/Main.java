import java.util.*;
import java.io.*;

public class Main {

	public static void main (String[]args) {
		Scanner sc = new Scanner (System.in);
		
		try {
			
			System.out.println("Introduce el primer número.");
			
			int n1 = sc.nextInt();
			
			System.out.println("Introduce el segundo número");
			
			int n2 = sc.nextInt();
			
			System.out.println("División;"+n1/n2);
		} catch(Exception e) {
			System.out.println("Excepcióm"+e);
	}
}
	
}

	

//(IOException e) {
	//e.printStackTrace();