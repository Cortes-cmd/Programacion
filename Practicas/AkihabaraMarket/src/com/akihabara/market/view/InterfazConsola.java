package com.akihabara.market.view;
import java.util.Scanner;
import com.akihabara.market.dao.DatabaseConnection;
import com.akihabara.market.model.*;
import com.akihabara.market.dao.*;
import java.sql.Connection;
//Importo las funcionalidades de la clase Conexion para establecer conexión con la base de datos
import java.util.*;
import com.akihabara.market.llm.*;
public class InterfazConsola {
	
	public void menu() {
		
		   int opcion= 0;
		   Scanner sc = new Scanner (System.in);
		   
		   DatabaseConnection db = new DatabaseConnection();
		   Connection conn = db.getConexion();
		   LlmService IC = new LlmService();
		   ProductoDAO dao = new ProductoDAO(conn);


		    //Con el do al menos una vez que ejecute el código para mostrar menú
		    do {
		        try {
		        	
		        	
		        	
		            System.out.println("---------------------------------------MENU----------------------------------------------- \n 1 - Agregar Productos   \n 2 - Insertar nombre de IA (recibe tipo y franquicia en la que se base) \n 3 - Obtener Producto Por ID \n 4 - Obtener todos los Productos\n 5 - Actualizar Producto \n 6 - Eliminar Producto \n 7 - Buscar Productos Por Nombre \n 8 - Buscar Producto Por Categoría\n 9 - Salir");
		            
		            //Instancia de scanner para escribir en consola 

		           opcion =sc .nextInt();
		           

		            
		            switch(opcion) {
		            
		            // según la opción ingresada se usa la función o se sale del programa
		                case 1:
		            		
		                	//Pido el nombre para meterlo en newNombre, así como con Categoría, pongo en false un booleano que será el condicionante de que no se rompa el while, si selecciona una opción válida lo paso a true
		            		System.out.println( "Elige el nombre del producto que deseas añadir \n");
		            		
		            		  sc.nextLine();
		            		String newNombre = sc.nextLine();
	                      

		            		String newCategoria= "";
            				
            				boolean CategoriaValida = false;
            				
            				
		            		do {
		            			try {
		            				System.out.println( "-----------------------------------------------------------Elige la categoria del producto que deseas añadir----------------------------------------------------------- "
				            				+ "\n"+" 1 - Figura  \n 2 - Manga \n 3 -Poster\n 4 - Llavero \n 5 - Ropa \n");
		            				
		            			
		            				
		            				
		            				String cat = sc.nextLine();
		            				
		            				switch(cat) {
				            		
		            				case "Figura":
		            					 newCategoria = "Figura";
		            					 CategoriaValida = true;
		            					break;
		            				case "Manga":
		            					 newCategoria = "Manga";
		            					 CategoriaValida = true;
		            					break;
		            				case"Poster":
		            					 newCategoria = "Poster";
		            					 CategoriaValida = true;
		            					break;
		            				case "Llavero":
		            					 newCategoria = "Llavero";
		            					 CategoriaValida = true;
		            					break;
		            				case "Ropa":
		            					 newCategoria = "Ropa";
		            					 CategoriaValida = true;
		            					break;
				            		
				            		default :
				            		System.out.println("Opción inválida")	;
				            		break;
				            		} 
		            			} catch (IllegalArgumentException e) {
		    		                System.out.println("Por favor ingresa un nombre válido");
		    		            }
		            		} while(!CategoriaValida);
		            		

		            		//Pido el resto de datos y los paso a la instancia de producto para luego entregarla a la función e insertar producto
		            		System.out.println( "Elige el precio del producto que deseas añadir \n");
		            		
		            		Double  newPrecio = sc.nextDouble();

		            		System.out.println( "Elige el stock que poseemos del producto que deseas añadir \n");
		            		
		            		int  newStock = sc.nextInt();

		            		
	             	ProductoOtaku prod = new ProductoOtaku(0,newNombre,newCategoria,newPrecio,newStock);
		            	
		            	
		             	dao.agregarProducto(prod);

		            		
		                    break;
		                    
		                case 2:
		                	
		                	sc.nextLine();
		                	
		                	System.out.println("Precisa el tipo de producto que sería");
		                	String	tipo = sc.nextLine();
		                	System.out.println("Dime en qué franquicia está basada");
		                	String	franquicia = sc.nextLine();
		                	System.out.print("Introduce el precio: ");
		                	double newPrecio1 = sc.nextDouble();
		                	System.out.print("Introduce el stock: ");
		                	int newStock1 = sc.nextInt();
		            		
		                	
		               String respuestaAI= 	IC.sugerirNombreProducto(tipo,franquicia);
		                	
		               System.out.println(respuestaAI);
		               
		               String nombreSugerido = respuestaAI.split("\n")[0].trim();
		                	sc.nextLine();
		                	
		                	System.out.println(nombreSugerido);
		            
		        

		                	ProductoOtaku prod1 = new ProductoOtaku(0,nombreSugerido,tipo,newPrecio1,newStock1);
		                	
			             	dao.agregarProducto(prod1);
			             	
			             	sc.nextLine();
			             	
			             	 break;
		                case 3:
		                	
		                	//Creo array que obtendrá los datos de la función de todos los productos, y a través de bucle for los muestro, luego inicializo variable qu alojará un scanner para obtener info del producto con ese id 
		            		ArrayList<ProductoOtaku> pos = (ArrayList<ProductoOtaku>)dao.obtenerTodosLosProductos();
		            		
		            		for(ProductoOtaku po : pos) {
		            			System.out.println(po);
		            		}
		            		
		            		//Pido que seleccione el id para pasarlo como argumento en la función tras alojarlo en una variable 
		            		System.out.println( "Elige el id del producto del que deseas obtener información");

		            		
		            		int id = sc.nextInt();
		            		
		            				
		            				
		            		System.out.println(dao.obtenerProductoPorId(id));
		            		
	                         break;
		           
		                case 4:
		                	
		                	sc.nextLine();

		                	//Creo instancia de ProductoDAO para usar el ArrayList necesario para emplear el método		            		
		            		ArrayList<ProductoOtaku> pos1 = (ArrayList<ProductoOtaku>)dao.obtenerTodosLosProductos();
		            		
		            		//Itero sobre cada elemento que nace de la consulta e imprimo cada fila
		            		for(ProductoOtaku po : pos1) {
		            		System.out.println(po);
		            		}
			                    break;
		                
		                	
		                case 5:
		                	
		                	sc.nextLine();

		                	//Creo array que obtendrá los datos de la función de todos los productos, y a través de bucle for los muestro
		        			ArrayList<ProductoOtaku> pos2 = (ArrayList<ProductoOtaku>)dao.obtenerTodosLosProductos();
		        		
		        			for(ProductoOtaku po : pos2) {
		        				System.out.println(po);
		        			}
		        				        				
		        			//Voy pidiendo los datos que introduciré en la instancia de producto y entregaré como producto actualizado
		        			System.out.println( "Elige el id del producto que deseas modificar \n");

		        			int Id1 = sc.nextInt();
		        			sc.nextLine(); 
		        			
		        			System.out.println( "Elige el nombre del producto que deseas modificar \n");

		        			String newNombre1 = sc.nextLine();
		        			
		        			System.out.println( "Elige la categoria del producto que deseas modificar \n");
		        			
		        			String newCategoria1 = sc.nextLine();

		        			System.out.println( "Elige el precio del producto que deseas modificar \n");
		        			
		        			Double  newPrecio2 = sc.nextDouble();

		        			System.out.println( "Elige el stock que poseemos del producto que deseas modificar \n");
		        			
		        			int  newStock2 = sc.nextInt();
		        				
		        			

		        			
		        		ProductoOtaku PO = new ProductoOtaku(Id1,newNombre1,newCategoria1,newPrecio2,newStock2);		
		        		
		        		dao.actualizarProducto(PO);
		        		
		                    break;
		                    
		                
		                case 6:
		                	
		                	sc.nextLine();

		                			ProductoDAO producto = new ProductoDAO(conn);

				                	//Creo array que obtendrá los datos de la función de todos los productos, y a través de bucle for los muestro para luego pedir el id del producto que se desee eliminar
		                			ArrayList<ProductoOtaku> pos3 = (ArrayList<ProductoOtaku>)producto.obtenerTodosLosProductos();
		                			
		                			//Itero sobre cada elemento que nace de la consulta e imprimo cada fila
		                			for(ProductoOtaku po : pos3) {
		                			System.out.println(po);
		                			}
		                			
		                			System.out.println( "Elige el id del producto que deseas eliminar \n");
		                			
		                			int Id = sc.nextInt();
		            		                			
		                			
		                			
		                			dao.eliminarProducto(Id);

		                			  sc.nextLine();

		                		
		                	
		                		
		                	
		                	
		                	break;
		                	
		                case 7:

		                	sc.nextLine();
		        				
		                	// Obtengo todos los productos tras limpiar buffer para que se detenga a recibir el dato del nombre del producto, luego recibo el nombre con scanner y busco por ese nombre usando el método
		        				System.out.println(dao.obtenerTodosLosProductos());

		        				System.out.println( "Elige el nombre del producto del que deseas adquirir información \n");
		        				String newNombre2 =  sc.nextLine();

		        				
		        				System.out.println(dao.buscarProductosPorNombre(newNombre2));


		        				break;
		        			
		                case 8:
		                			        
		                	sc.nextLine();

		                	//Tras limpiar buffer pregunto la categoría, y a través de un array de los datos almacenados en producto Otaku, busco el producto cuya categoría encaje con el dado por scanner
		        			System.out.println( "Elige la categoría del producto que deseas encontrar, las disponibles son;  \n");
		        			System.out.println( " 1 - Figura  \n 2 - Manga \n 3 - Poster\n 4 - Llavero \n 5 - Ropa   \n");

		        			String newCategoria2 = sc.nextLine();
		        		
		        			
		        		System.out.println(dao.buscarProductoPorCategoria(newCategoria2));
		        			
		        			break;
		                case 9:
		                	
		                	// Salgo del programa
		                	
		                    System.out.println("Saliendo del programa...");
		                    
		                    break;
		                    
		                    
		                    //Valor por defecto si se introduce algo no registrado
		                    
		               default:
		                    System.out.println("Selecciona una opcion válida del menu");
		            }
		            
		            // Registro de error
		            } catch (NumberFormatException e) {
		                System.out.println("Por favor ingresa un número válido");
		            }
		        
		        //Mientras que la opción elegida no sea cinco,, que sería para salir del programa
		        } while(opcion != 9);
		        
		    db.closeConexion();
		    	sc.close();
		    }


	}
	 

