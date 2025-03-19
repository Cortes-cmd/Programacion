public class OperacionesBasicas {

public static void main(String[] args){
    System.out.println("Suma: " + sumar(4,6));    
    System.out.println("Resta: " + restar(5,2));    
    System.out.println("Multi: " + multiplicar(10,10));    
    System.out.println("Division: " + dividir(4,2));    



}
public static int sumar(int a, int b){
return a + b;
}

public static int restar(int a, int b){
return a - b;
}

public static int multiplicar(int a, int b){
return a * b;
}

public static int dividir(int a, int b){
return a / b;
}

}