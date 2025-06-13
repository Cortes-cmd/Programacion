package com.akihabara.market.model;

public class ProductoOtaku {

	protected int id;
	String nombre;
	String categoria;
	Double precio;
	int stock;


public ProductoOtaku() {};

public ProductoOtaku(int id,String nombre, String categoria, Double precio, int stock) {
	
	this.id= id;
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

public Double getPrecio(){
	return precio;
}

public int getStock(){
	return stock;
}

public int getId(){
	return id;
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

public void setId(int id) {
	this.id =id;
}

public String toString() {
	
	return "------------------------------------\nDatos de Akihabara_Market \n -----------------------------------\n"
	 +		" Id: \n" +id+ "\nNombre: \n\n"+nombre+"\nCategoria: \n\n"+categoria+"\nPrecio: \n\n"+String.format("%.2f", precio)+"\nStock: \n\n"+stock+"\n\n";
}

}