package com.akihabara.market.model;

public class ProductoOtaku {

	String nombre;
	String categoria;
	Double precio;
	int stock;


public ProductoOtaku() {};

public ProductoOtaku(String nombre, String categoria, Double precio, int stock) {
	
	this.nombre= nombre;
	this.categoria= categoria;
	this.precio=precio;
	this.stock=stock;
}

public String getNombre(){
	return nombre;
}

public String getCategoria(){
	return categoria;
}

public Double getprecio(){
	return precio;
}

public int getStock(){
	return stock;
}

public void setNombre(String nombre) {
	this.nombre =nombre;
}

public void setCategoria(String categoria) {
	this.categoria =categoria;
}

public void setPrecio(double precio) {
	this.precio =precio;
}

public void setStock(int stock) {
	this.stock =stock;
}

public String toString() {
	
	return "------------------------------------\nDatos de Akihabara_Market \n -----------------------------------\n"
			+ "Nombre: \n\n"+nombre+"\nCategoria: \n\n"+categoria+"\nPrecio: \n\n"+String.format("%.2f", precio)+"\nStock: \n\n"+stock;
}

}