package com.akihabara.market.view;

import com.akihabara.market.dao.DatabaseConnection;
import com.akihabara.market.dao.ProductoDAO;
import com.akihabara.market.model.ProductoOtaku;
import com.akihabara.market.llm.LlmService;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.util.List;

public class MainGUI extends JFrame {
    private JTextField nombreField, categoriaField, precioField, stockField;
    private JTable tabla;
    private DefaultTableModel modeloTabla;
    private CardLayout cardLayout;
    private JPanel panelCentral;

	DatabaseConnection db = new DatabaseConnection();
    Connection conn = db.getConexion();
    private ProductoDAO productoDAO = new ProductoDAO(conn);
	LlmService IC = new LlmService();


    public MainGUI() {
        setTitle("Akihabara Otaku Market");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(700, 500);
        setLocationRelativeTo(null);
        
        //Botones de navegación
        
        JPanel panelBotones = new JPanel(new FlowLayout());
        JButton btnAlta = new JButton("Dar de Alta");
        JButton btnSugerenciaAI = new JButton("Alta con IA");
        JButton btnMostrar = new JButton("Mostrar Todos");
        JButton btnEditar = new JButton("Editar Producto");
        JButton btnEliminar = new JButton("Eliminar Producto");
        
     // ActionListeners para navegación
        btnAlta.addActionListener(e -> cardLayout.show(panelCentral, "ALTA"));
        btnSugerenciaAI.addActionListener(e -> cardLayout.show(panelCentral, "ALTA_IA"));
        btnMostrar.addActionListener(e -> {
            cargarProductosEnTabla();
            cardLayout.show(panelCentral, "MOSTRAR");
        });
        btnEditar.addActionListener(e -> cardLayout.show(panelCentral, "EDITAR"));
        btnEliminar.addActionListener(e -> cardLayout.show(panelCentral, "ELIMINAR"));

        // Añadir botones al panel superior
        panelBotones.add(btnAlta);
        panelBotones.add(btnSugerenciaAI);
        panelBotones.add(btnMostrar);
        panelBotones.add(btnEditar);
        panelBotones.add(btnEliminar);
        
        
        cardLayout = new CardLayout();
        panelCentral = new JPanel(cardLayout);
        
        panelCentral.add(FormularioAlta(), "ALTA");
        panelCentral.add(FormularioAltaIA(), "ALTA_IA");
        panelCentral.add(mostrarTablaProductos(), "MOSTRAR");
        panelCentral.add(FormularioEditar(), "EDITAR");
        panelCentral.add(FormularioEliminar(), "ELIMINAR");

        
        JPanel panelPrincipal = new JPanel(new BorderLayout());
        panelPrincipal.add(panelBotones, BorderLayout.NORTH);
        panelPrincipal.add(panelCentral, BorderLayout.CENTER);
        add(panelPrincipal);




        setVisible(true);

        cargarProductosEnTabla();
    }

    private JPanel FormularioAlta() {
        JPanel panelFormulario = new JPanel(new GridBagLayout());
        GridBagConstraints gbc = new GridBagConstraints();

        // Campos
        JTextField nombreField = new JTextField(15);
        JTextField categoriaField = new JTextField(15);
        JTextField precioField = new JTextField(15);
        JTextField stockField = new JTextField(15);

        JButton btnAlta = new JButton("Confirmar inserción");

        // Espaciado y configuración general
        gbc.insets = new Insets(20, 20, 20, 20);
        gbc.fill = GridBagConstraints.HORIZONTAL;
        gbc.anchor = GridBagConstraints.WEST;

        // Nombre
        gbc.gridx = 0;
        gbc.gridy = 0;
        panelFormulario.add(new JLabel("Nombre:"), gbc);

        gbc.gridx = 1;
        gbc.gridy = 0;
        panelFormulario.add(nombreField, gbc);

        // Categoría
        gbc.gridx = 0;
        gbc.gridy = 1;
        panelFormulario.add(new JLabel("Categoría:"), gbc);

        gbc.gridx = 1;
        gbc.gridy = 1;
        panelFormulario.add(categoriaField, gbc);

        // Precio
        gbc.gridx = 0;
        gbc.gridy = 2;
        panelFormulario.add(new JLabel("Precio:"), gbc);

        gbc.gridx = 1;
        gbc.gridy = 2;
        panelFormulario.add(precioField, gbc);

        // Stock
        gbc.gridx = 0;
        gbc.gridy = 3;
        panelFormulario.add(new JLabel("Stock:"), gbc);

        gbc.gridx = 1;
        gbc.gridy = 3;
        panelFormulario.add(stockField, gbc);

        // Panel para el botón centrado
        JPanel panelBoton = new JPanel(new FlowLayout(FlowLayout.CENTER));
        panelBoton.add(btnAlta);

        gbc.gridx = 0;
        gbc.gridy = 4;
        gbc.gridwidth = 6;
        gbc.anchor = GridBagConstraints.CENTER;
        gbc.fill = GridBagConstraints.NONE;
        panelFormulario.add(panelBoton, gbc);

        // Acción botón
        btnAlta.addActionListener(e -> {
            try {
                String nombre = nombreField.getText();
                String categoria = categoriaField.getText();
                double precio = Double.parseDouble(precioField.getText());
                int stock = Integer.parseInt(stockField.getText());

                ProductoOtaku p = new ProductoOtaku(0, nombre, categoria, precio, stock);
                productoDAO.agregarProducto(p);
                cargarProductosEnTabla();

                // Opcional: limpiar campos después de insertar
                nombreField.setText("");
                categoriaField.setText("");
                precioField.setText("");
                stockField.setText("");

                JOptionPane.showMessageDialog(panelFormulario, "Producto agregado correctamente.");
            } catch (NumberFormatException ex) {
                JOptionPane.showMessageDialog(panelFormulario, "Por favor, introduce valores numéricos válidos para Precio y Stock.", "Error de formato", JOptionPane.ERROR_MESSAGE);
            }
        });

        return panelFormulario;
    }

        
    private JPanel FormularioAltaIA() {
        JPanel panel = new JPanel(new GridBagLayout());
        GridBagConstraints gbc = new GridBagConstraints();

        
        // Campos
        JTextField franquiciaField = new JTextField(15);
        JTextField categoriaField = new JTextField(15);
        JTextField nombreIAField = new JTextField(15);
        JTextField precioField = new JTextField(15);
        JTextField stockField = new JTextField(15);

        JButton btnSugerir = new JButton("Sugerir nombre AI");
        JButton btnAlta = new JButton("Confirmar inserción");

        // Estilos de espaciado
        gbc.insets = new Insets(10, 10, 10, 10);
        gbc.fill = GridBagConstraints.HORIZONTAL;
        gbc.anchor = GridBagConstraints.WEST;

        // Fila 0 - Franquicia
        gbc.gridx = 0; gbc.gridy = 0;
        panel.add(new JLabel("Franquicia:"), gbc);
        gbc.gridx = 1;
        panel.add(franquiciaField, gbc);

        // Fila 1 - Categoría
        gbc.gridx = 0; gbc.gridy = 1;
        panel.add(new JLabel("Categoría:"), gbc);
        gbc.gridx = 1;
        panel.add(categoriaField, gbc);

        // Fila 2 - Nombre
        gbc.gridx = 0; gbc.gridy = 2;
        panel.add(new JLabel("Nombre:"), gbc);
        gbc.gridx = 1;
        panel.add(nombreIAField, gbc);

        // Fila 3 - Precio
        gbc.gridx = 0; gbc.gridy = 3;
        panel.add(new JLabel("Precio:"), gbc);
        gbc.gridx = 1;
        panel.add(precioField, gbc);

        // Fila 4 - Stock
        gbc.gridx = 0; gbc.gridy = 4;
        panel.add(new JLabel("Stock:"), gbc);
        gbc.gridx = 1;
        panel.add(stockField, gbc);

        // Fila 5 - Botones centrados
        JPanel botones = new JPanel(new FlowLayout(FlowLayout.CENTER));
        botones.add(btnAlta);
        botones.add(btnSugerir);

        gbc.gridx = 0; gbc.gridy = 5;
        gbc.gridwidth = 2;
        gbc.anchor = GridBagConstraints.CENTER;
        gbc.fill = GridBagConstraints.NONE;
        panel.add(botones, gbc);

        // Acciones
        btnSugerir.addActionListener(e -> {
            String tipo = categoriaField.getText().trim();
            String franquicia = franquiciaField.getText().trim();
            if (tipo.isEmpty() || franquicia.isEmpty()) {
                JOptionPane.showMessageDialog(this, "Categoría y franquicia son obligatorios", "Error", JOptionPane.ERROR_MESSAGE);
                return;
            }
            String respuestaAI = IC.sugerirNombreProducto(tipo, franquicia);
            String nombreSugerido = respuestaAI.split("\n")[0].trim();
            nombreIAField.setText(nombreSugerido);
        });

        btnAlta.addActionListener(e -> {
            try {
                String nombre = nombreIAField.getText();
                String categoria = categoriaField.getText();
                double precio = Double.parseDouble(precioField.getText());
                int stock = Integer.parseInt(stockField.getText());
                ProductoOtaku p = new ProductoOtaku(0, nombre, categoria, precio, stock);
                productoDAO.agregarProducto(p);
                cargarProductosEnTabla();
                
                nombreIAField.setText("");	
                categoriaField.setText("");
                precioField.setText("");
                stockField.setText("");
                
                
            } catch (NumberFormatException ex) {
                JOptionPane.showMessageDialog(this, "Datos inválidos", "Error", JOptionPane.ERROR_MESSAGE);
            }
        });

        panel.setBorder(BorderFactory.createTitledBorder("Alta con IA"));
        return panel;
    }



       
    

    private JPanel mostrarTablaProductos() {
        String[] columnas = {"ID", "Nombre", "Categoría", "Precio", "Stock"};
        modeloTabla = new DefaultTableModel(columnas, 0);
        tabla = new JTable(modeloTabla);

        JPanel panel = new JPanel(new BorderLayout());
        panel.setBorder(BorderFactory.createTitledBorder("Lista de Productos"));
        panel.add(new JScrollPane(tabla), BorderLayout.CENTER);

        // Botón Recargar Tabla
        JButton btnRecargar = new JButton("Recargar Tabla");
        btnRecargar.addActionListener(e -> cargarProductosEnTabla());

        // Añadir el botón al sur del panel
        JPanel panelBoton = new JPanel(new FlowLayout(FlowLayout.CENTER));
        panelBoton.add(btnRecargar);
        panel.add(panelBoton, BorderLayout.SOUTH);

        // Cargar datos inicialmente
        cargarProductosEnTabla();

        return panel;
    }


    private void cargarProductosEnTabla() {
        modeloTabla.setRowCount(0);
        List<ProductoOtaku> productos = productoDAO.obtenerTodosLosProductos();
        for (ProductoOtaku p : productos) {
            Object[] fila = {p.getId(), p.getNombre(), p.getCategoria(), p.getPrecio(), p.getStock()};
            modeloTabla.addRow(fila);
            

        }
    }
    
    private JPanel FormularioEditar() {
        JPanel panel = new JPanel(new GridBagLayout());
        GridBagConstraints gbc = new GridBagConstraints();

        JTextField idField = new JTextField(15);
        JTextField nombreField = new JTextField(15);
        JTextField categoriaField = new JTextField(15);
        JTextField precioField = new JTextField(15);
        JTextField stockField = new JTextField(15);

        JButton btnBuscar = new JButton("Buscar por ID");
        JButton btnActualizar = new JButton("Actualizar");

        gbc.insets = new Insets(10, 10, 10, 10);
        gbc.fill = GridBagConstraints.HORIZONTAL;
        gbc.anchor = GridBagConstraints.WEST;

        // ID
        gbc.gridx = 0; gbc.gridy = 0;
        panel.add(new JLabel("ID:"), gbc);
        gbc.gridx = 1;
        panel.add(idField, gbc);

        // Nombre
        gbc.gridx = 0; gbc.gridy = 1;
        panel.add(new JLabel("Nombre:"), gbc);
        gbc.gridx = 1;
        panel.add(nombreField, gbc);

        // Categoría
        gbc.gridx = 0; gbc.gridy = 2;
        panel.add(new JLabel("Categoría:"), gbc);
        gbc.gridx = 1;
        panel.add(categoriaField, gbc);

        // Precio
        gbc.gridx = 0; gbc.gridy = 3;
        panel.add(new JLabel("Precio:"), gbc);
        gbc.gridx = 1;
        panel.add(precioField, gbc);

        // Stock
        gbc.gridx = 0; gbc.gridy = 4;
        panel.add(new JLabel("Stock:"), gbc);
        gbc.gridx = 1;
        panel.add(stockField, gbc);

        // Botones
        JPanel botones = new JPanel(new FlowLayout(FlowLayout.CENTER));
        botones.add(btnBuscar);
        botones.add(btnActualizar);

        gbc.gridx = 0; gbc.gridy = 5;
        gbc.gridwidth = 2;
        gbc.anchor = GridBagConstraints.CENTER;
        gbc.fill = GridBagConstraints.NONE;
        panel.add(botones, gbc);

        // Lógica de botones
        btnBuscar.addActionListener(e -> {
            try {
                int id = Integer.parseInt(idField.getText());
                ProductoOtaku producto = productoDAO.obtenerProductoPorId(id);
                if (producto != null) {
                    nombreField.setText(producto.getNombre());
                    categoriaField.setText(producto.getCategoria());
                    precioField.setText(String.valueOf(producto.getPrecio()));
                    stockField.setText(String.valueOf(producto.getStock()));
                } else {
                    JOptionPane.showMessageDialog(this, "Producto no encontrado", "Error", JOptionPane.ERROR_MESSAGE);
                }
            } catch (NumberFormatException ex) {
                JOptionPane.showMessageDialog(this, "ID inválido", "Error", JOptionPane.ERROR_MESSAGE);
            }
        });

        btnActualizar.addActionListener(e -> {
            try {
                int id = Integer.parseInt(idField.getText());
                String nombre = nombreField.getText();
                String categoria = categoriaField.getText();
                double precio = Double.parseDouble(precioField.getText());
                int stock = Integer.parseInt(stockField.getText());

                ProductoOtaku actualizado = new ProductoOtaku(id, nombre, categoria, precio, stock);
                if (productoDAO.actualizarProducto(actualizado)) {
                    JOptionPane.showMessageDialog(this, "Producto actualizado correctamente");
                    cargarProductosEnTabla();
                } else {
                    JOptionPane.showMessageDialog(this, "Error al actualizar producto", "Error", JOptionPane.ERROR_MESSAGE);
                }
            } catch (NumberFormatException ex) {
                JOptionPane.showMessageDialog(this, "Datos inválidos", "Error", JOptionPane.ERROR_MESSAGE);
            }
        });

        panel.setBorder(BorderFactory.createTitledBorder("Editar Producto"));
        return panel;
    }

    
    private JPanel FormularioEliminar() {
        JPanel panel = new JPanel(new GridBagLayout());
        GridBagConstraints gbc = new GridBagConstraints();

        JTextField idField = new JTextField(15);
        JButton btnEliminar = new JButton("Eliminar");

        gbc.insets = new Insets(10, 10, 10, 10);
        gbc.fill = GridBagConstraints.HORIZONTAL;
        gbc.anchor = GridBagConstraints.WEST;

        // ID
        gbc.gridx = 0; gbc.gridy = 0;
        panel.add(new JLabel("ID del producto:"), gbc);
        gbc.gridx = 1;
        panel.add(idField, gbc);

        // Botón centrado
        JPanel botones = new JPanel(new FlowLayout(FlowLayout.CENTER));
        botones.add(btnEliminar);

        gbc.gridx = 0; gbc.gridy = 1;
        gbc.gridwidth = 2;
        gbc.anchor = GridBagConstraints.CENTER;
        gbc.fill = GridBagConstraints.NONE;
        panel.add(botones, gbc);

        // Acción eliminar
        btnEliminar.addActionListener(e -> {
            try {
                int id = Integer.parseInt(idField.getText());
                int confirmacion = JOptionPane.showConfirmDialog(this, "¿Seguro que deseas eliminar este producto?", "Confirmar", JOptionPane.YES_NO_OPTION);
                if (confirmacion == JOptionPane.YES_OPTION) {
                    if (productoDAO.eliminarProducto(id)) {
                        JOptionPane.showMessageDialog(this, "Producto eliminado correctamente");
                        cargarProductosEnTabla();
                    } else {
                        JOptionPane.showMessageDialog(this, "Producto no encontrado", "Error", JOptionPane.ERROR_MESSAGE);
                    }
                }
            } catch (NumberFormatException ex) {
                JOptionPane.showMessageDialog(this, "ID inválido", "Error", JOptionPane.ERROR_MESSAGE);
            }
        });

        panel.setBorder(BorderFactory.createTitledBorder("Eliminar Producto"));
        return panel;
    }




    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> new MainGUI());
    }
}

