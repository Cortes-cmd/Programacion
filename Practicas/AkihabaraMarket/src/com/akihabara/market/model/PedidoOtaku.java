package com.akihabara.market.model;


import java.sql.Date;
import java.util.List;

public class PedidoOtaku {
    private int idPedido;
    private String dniCliente;
    private Date fecha;
    private List<DetallePedidoOtaku> detalles;

    // Constructores
    public PedidoOtaku() {}

    public PedidoOtaku(int idPedido, String dniCliente, Date fecha) {
        this.idPedido = idPedido;
        this.dniCliente = dniCliente;
        this.fecha = fecha;
    }

    // Getters y Setters
    public int getIdPedido() { return idPedido; }
    public void setIdPedido(int idPedido) { this.idPedido = idPedido; }

    public String getDniCliente() { return dniCliente; }
    public void setDniCliente(String dniCliente) { this.dniCliente = dniCliente; }

    public Date getFecha() { return fecha; }
    public void setFecha(Date fecha) { this.fecha = fecha; }

    public List<DetallePedidoOtaku> getDetalles() { return detalles; }
    public void setDetalles(List<DetallePedidoOtaku> detalles) { this.detalles = detalles; }
    
    @Override
    public String toString() {
        return "------------------------------------\nPedido\n------------------------------------\n"
                + "ID Pedido: " + idPedido
                + "\nDNI Cliente: " + dniCliente
                + "\nFecha: " + fecha
                + "\nDetalles:\n" + detalles.toString();
    }

}

