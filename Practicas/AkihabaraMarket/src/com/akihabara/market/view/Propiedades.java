package com.akihabara.market.view;

import java.io.FileInputStream;
import java.io.IOException;
import java.util.Properties;

public class Propiedades {

	public static void propertiesLectura() {
		
		Properties props = new Properties();
	     try {
	         props.load(new FileInputStream("config.properties"));
	         String key = props.getProperty("OPENROUTER_API_KEY");
	         System.out.println("OPENROUTER_API_KEY" + key);
	          
	     } catch (IOException e) {
	         System.out.println("No se ha podido leer el archivo de configuración");
	     
	}
	 }
}
