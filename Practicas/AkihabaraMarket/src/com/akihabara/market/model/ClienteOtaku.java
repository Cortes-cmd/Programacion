package com.akihabara.market.model;

import java.sql.Date;

public class ClienteOtaku{

    protected String dni;
    private String nombre;
    private String email;
    private String telefono;
    private Date fechaRegistro;

    public ClienteOtaku() {}

    public ClienteOtaku(String dni, String nombre, String email, String telefono, Date fechaRegistro) {
        this.dni = dni;
        this.nombre = nombre;
        this.email = email;
        this.telefono = telefono;
        this.fechaRegistro = fechaRegistro;;
    }


    // Getters
    public String getDni() {
        return dni;
    }

    public String getNombre() {
        return nombre;
    }

    public String getEmail() {
        return email;
    }

    public String getTelefono() {
        return telefono;
    }

    public Date getFechaRegistro() {
        return fechaRegistro;
    }

    // Setters
    public void setDni(String dni) {
        this.dni = dni;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setTelefono(String telefono) {
        this.telefono = telefono;
    }

    public void setFechaRegistro(Date fechaRegistro) {
        this.fechaRegistro = fechaRegistro;
    }

    @Override
    public String toString() {
        return "------------------------------------\nDatos del Cliente\n------------------------------------\n"
                + "DNI: " + dni
                + "\nNombre: " + nombre
                + "\nEmail: " + email
                + "\nTeléfono: " + telefono
                + "\nFecha de Registro: " + fechaRegistro + "\n";
    }
}
