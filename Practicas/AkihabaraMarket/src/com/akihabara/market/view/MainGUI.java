package com.akihabara.market.view;

import com.akihabara.market.dao.DatabaseConnection;
import com.akihabara.market.dao.ProductoDAO;
import com.akihabara.market.dao.PedidoOtakuDAO;
import com.akihabara.market.model.ProductoOtaku;
import com.akihabara.market.model.ClienteOtaku;
import com.akihabara.market.model.PedidoOtaku;
import com.akihabara.market.model.DetallePedidoOtaku;
import com.akihabara.market.dao.DetallePedidoOtakuDAO;
import com.akihabara.market.dao.ClienteOtakuDAO;

import com.akihabara.market.llm.LlmService;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.util.List;
import java.util.ArrayList;

public class MainGUI extends JFrame {
    private JTextField nombreField, categoriaField, precioField, stockField;
    private JTable tabla;
    private DefaultTableModel modeloTabla;
    private CardLayout cardLayout;
    private JPanel panelCentral;
    private JPanel panelBotones;
    private JPanel panelBotonesPedidos;

	DatabaseConnection db = new DatabaseConnection();
    Connection conn = db.getConexion();
    private ProductoDAO productoDAO = new ProductoDAO(conn);
    private ClienteOtakuDAO ClienteDAO = new ClienteOtakuDAO(conn);
	LlmService IC = new LlmService();

	// Atributos globales
	private CardLayout cardLayoutPanelAcciones;
	private CardLayout cardLayoutFormularios;
	private JPanel panelAcciones;
	private JPanel panelFormularios;

	public MainGUI() {
	    setTitle("Akihabara Otaku Market");
	    setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	    setSize(700, 500);
	    setLocationRelativeTo(null);

	    panelBotonesPedidos = new JPanel(new FlowLayout());

	    
	    // ----------- Botones de entidad (Clientes/Productos)
	    JPanel panelBotonesProductos = new JPanel();
	    JPanel panelBotonesClientes = new JPanel();
	    panelBotones = new JPanel(new FlowLayout());
	    panelBotonesPedidos = new JPanel(new FlowLayout()); 

	    JPanel panelSuperior = new JPanel(new FlowLayout(FlowLayout.LEFT));

	    
	    JButton btnClientes = new JButton("Clientes");
	    JButton btnProductos = new JButton("Productos");
	    JButton btnPedidos = new JButton("Pedidos");

	    panelSuperior.add(btnClientes);
	    panelSuperior.add(btnProductos);
	    panelSuperior.add(btnPedidos);


	    // ----------- Panel de acciones (botones funcionales)
	    
	    panelAcciones = new JPanel();
	    cardLayoutPanelAcciones = new CardLayout();
	    panelAcciones.setLayout(cardLayoutPanelAcciones);

	    // --- Subpanel de acciones de productos
	    JPanel accionesProductos = new JPanel(new GridLayout(2, 2, 10, 10));
	    JButton btnAltaProd = new JButton("Insertar Producto");
	    JButton btnAltaProdIA = new JButton("Insertar con IA");  // NUEVO BOTÓN
	    JButton btnMostrarProd = new JButton("Mostrar Productos");
	    JButton btnEditarProd = new JButton("Editar Producto");
	    JButton btnEliminarProd = new JButton("Eliminar Producto");
	    accionesProductos.add(btnAltaProd);
	    accionesProductos.add(btnAltaProdIA); // NUEVO BOTÓN
	    accionesProductos.add(btnMostrarProd);
	    accionesProductos.add(btnEditarProd);
	    accionesProductos.add(btnEliminarProd);

	    // --- Subpanel de acciones de clientes
	    JPanel accionesClientes = new JPanel(new GridLayout(2, 2, 10, 10));
	    JButton btnAltaCliente = new JButton("Insertar Cliente");
	    JButton btnMostrarCliente = new JButton("Obtener Clientes");
	    JButton btnEditarCliente = new JButton("Editar Cliente");
	    JButton btnEliminarCliente = new JButton("Eliminar Cliente");
	    accionesClientes.add(btnAltaCliente);
	    accionesClientes.add(btnMostrarCliente);
	    accionesClientes.add(btnEditarCliente);
	    accionesClientes.add(btnEliminarCliente);
	    
	 // Agrega botones al panel de pedidos
	    JPanel accionesPedidos = new JPanel(new GridLayout(2, 2, 10, 10));
	    JButton btnRegistrarPedido = new JButton("Registrar Pedido");
	    JButton btnMostrarPedidos = new JButton("Mostrar Pedidos");
	    JButton btnEliminarPedido = new JButton("Eliminar Pedido");

	    panelBotonesPedidos.add(btnRegistrarPedido);
	    panelBotonesPedidos.add(btnMostrarPedidos);
	    panelBotonesPedidos.add(btnEliminarPedido);


	    panelAcciones.add(accionesProductos, "PRODUCTOS");
	    panelAcciones.add(accionesClientes, "CLIENTES");
	    panelAcciones.add(accionesPedidos, "PEDIDOS");


	 // ----------- Panel para formularios o tablas
	    panelFormularios = new JPanel();
	    cardLayoutFormularios = new CardLayout();
	    panelFormularios.setLayout(cardLayoutFormularios);

	    // Usa el formulario con IA para alta de productos
	    panelFormularios.add(FormularioAlta(), "ALTA_PRODUCTO");
	    panelFormularios.add(FormularioAltaIA(), "ALTA_PRODUCTO_IA");      // IA
	    panelFormularios.add(mostrarTablaProductos(), "MOSTRAR_PRODUCTOS");
	    panelFormularios.add(FormularioEditar(), "EDITAR_PRODUCTO");
	    panelFormularios.add(FormularioEliminar(), "ELIMINAR_PRODUCTO");

	    // Formularios de cliente
	    panelFormularios.add(FormularioAltaCliente(), "ALTA_CLIENTE");
	    panelFormularios.add(FormularioMostrarClientes(), "MOSTRAR_CLIENTES");
	    panelFormularios.add(FormularioEditarCliente(), "EDITAR_CLIENTE");
	    panelFormularios.add(FormularioEliminarCliente(), "ELIMINAR_CLIENTE");


	    // ----------- Acciones al pulsar en entidad
	    btnClientes.addActionListener(e -> cardLayoutPanelAcciones.show(panelAcciones, "CLIENTES"));
	    btnProductos.addActionListener(e -> cardLayoutPanelAcciones.show(panelAcciones, "PRODUCTOS"));
	    btnPedidos.addActionListener(e -> {
	    	    cardLayoutFormularios.show(panelFormularios, "FORMULARIO_PEDIDO");

	    	    cardLayoutPanelAcciones.show(panelAcciones, "PEDIDOS"); // <- Esto oculta los botones de PRODUCTOS/CLIENTES

	    	    panelBotones.removeAll();
	    	    panelBotones.add(panelBotonesPedidos);
	    	    panelBotones.revalidate();
	    	    panelBotones.repaint();
	    });



	    // ----------- Acciones de los botones funcionales
	    btnAltaProd.addActionListener(e -> cardLayoutFormularios.show(panelFormularios, "ALTA_PRODUCTO"));
	    btnAltaProdIA.addActionListener(e -> cardLayoutFormularios.show(panelFormularios, "ALTA_PRODUCTO_IA"));
	    btnMostrarProd.addActionListener(e -> {
	        cargarProductosEnTabla();
	        cardLayoutFormularios.show(panelFormularios, "MOSTRAR_PRODUCTOS");
	    });
	    btnEditarProd.addActionListener(e -> cardLayoutFormularios.show(panelFormularios, "EDITAR_PRODUCTO"));
	    btnEliminarProd.addActionListener(e -> cardLayoutFormularios.show(panelFormularios, "ELIMINAR_PRODUCTO"));

	    btnAltaCliente.addActionListener(e -> cardLayoutFormularios.show(panelFormularios, "ALTA_CLIENTE"));
	    btnMostrarCliente.addActionListener(e -> cardLayoutFormularios.show(panelFormularios, "MOSTRAR_CLIENTES"));
	    btnEditarCliente.addActionListener(e -> cardLayoutFormularios.show(panelFormularios, "EDITAR_CLIENTE"));
	    btnEliminarCliente.addActionListener(e -> cardLayoutFormularios.show(panelFormularios, "ELIMINAR_CLIENTE"));

	    btnRegistrarPedido.addActionListener(e -> {
	        panelFormularios.add(FormularioPedido(), "FORMULARIO_PEDIDO");  // Este formulario ya lo tienes
	        cardLayoutFormularios.show(panelFormularios, "FORMULARIO_PEDIDO");
	    });

	    btnMostrarPedidos.addActionListener(e -> {
	        panelFormularios.add(FormularioMostrarPedidos(), "MOSTRAR_PEDIDOS"); // Crea este método
	        cardLayoutFormularios.show(panelFormularios, "MOSTRAR_PEDIDOS");
	    });

	    btnEliminarPedido.addActionListener(e -> {
	        panelFormularios.add(FormularioEliminarPedido(), "ELIMINAR_PEDIDO"); // Crea este método
	        cardLayoutFormularios.show(panelFormularios, "ELIMINAR_PEDIDO");
	    });

	    
	    JPanel panelBienvenida = new JPanel();
	    panelBienvenida.add(new JLabel("BIENVENIDO A AKIHABARA OTAKU MARKET"));
	    panelFormularios.add(panelBienvenida, "BIENVENIDA");
	    cardLayoutFormularios.show(panelFormularios, "BIENVENIDA");

	    
	 // ----------- Panel combinado (acciones + formularios)
	    JPanel panelCentral = new JPanel(new BorderLayout());
	    panelCentral.add(panelAcciones, BorderLayout.NORTH);   // Botones como "Insertar Cliente", etc.
	    panelCentral.add(panelFormularios, BorderLayout.CENTER); // Formularios/tablas aquí

	    // ----------- Panel principal
	    JPanel panelPrincipal = new JPanel(new BorderLayout());
	    panelPrincipal.add(panelSuperior, BorderLayout.NORTH); // Botones "Clientes"/"Productos"
	    panelPrincipal.add(panelCentral, BorderLayout.CENTER); // Todo el contenido dinámico

	    panelPrincipal.add(panelBotones, BorderLayout.SOUTH); // Para mostrar los botones funcionales según la sección
	    add(panelPrincipal);
	    setVisible(true);
	}



    private JPanel FormularioAlta() {
        JPanel panelFormulario = new JPanel(new GridBagLayout());
        GridBagConstraints gbc = new GridBagConstraints();

        // Campos
        JTextField nombreField = new JTextField(30);
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
        
        panelFormulario.setBorder(BorderFactory.createTitledBorder("Alta Producto"));

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
    
    private JPanel FormularioAltaCliente() {
        JPanel panel = new JPanel(new GridBagLayout());
        GridBagConstraints gbc = new GridBagConstraints();

        JTextField dniField = new JTextField(15);
        JTextField nombreField = new JTextField(15);
        JTextField emailField = new JTextField(15);
        JTextField telefonoField = new JTextField(15);
        JTextField fechaField = new JTextField(15); // formato yyyy-MM-dd

        JButton btnAlta = new JButton("Agregar Cliente");

        gbc.insets = new Insets(10, 10, 10, 10);
        gbc.fill = GridBagConstraints.HORIZONTAL;

        String[] labels = {"DNI:", "Nombre:", "Email:", "Teléfono:", "Fecha Registro (yyyy-MM-dd):"};
        JTextField[] fields = {dniField, nombreField, emailField, telefonoField, fechaField};

        for (int i = 0; i < labels.length; i++) {
            gbc.gridx = 0; gbc.gridy = i;
            panel.add(new JLabel(labels[i]), gbc);
            gbc.gridx = 1;
            panel.add(fields[i], gbc);
        }

        JPanel panelBtn = new JPanel(new FlowLayout(FlowLayout.CENTER));
        panelBtn.add(btnAlta);
        gbc.gridx = 0; gbc.gridy = labels.length;
        gbc.gridwidth = 2;
        gbc.anchor = GridBagConstraints.CENTER;
        gbc.fill = GridBagConstraints.NONE;
        panel.add(panelBtn, gbc);

        btnAlta.addActionListener(e -> {
            try {
                String dni = dniField.getText().trim();
                if (dni.isEmpty()) {
                    JOptionPane.showMessageDialog(panel, "El campo DNI es obligatorio.", "Error", JOptionPane.ERROR_MESSAGE);
                    return;
                }

                ClienteOtaku cli = new ClienteOtaku(
                    dni,
                    nombreField.getText(),
                    emailField.getText(),
                    telefonoField.getText(),
                    java.sql.Date.valueOf(fechaField.getText())
                );
                ClienteDAO.agregarCliente(cli);
                JOptionPane.showMessageDialog(panel, "Cliente agregado correctamente.");
                for (JTextField f : fields) f.setText("");
            } catch (Exception ex) {
                JOptionPane.showMessageDialog(panel, "Error: Verifica los datos.\n" + ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            }
        });


        panel.setBorder(BorderFactory.createTitledBorder("Alta de Cliente"));
        return panel;
    }
    
    private JPanel FormularioMostrarClientes() {
        String[] columnas = {"DNI", "Nombre", "Email", "Teléfono", "Fecha de Registro"};
        DefaultTableModel modeloClientes = new DefaultTableModel(columnas, 0);
        JTable tablaClientes = new JTable(modeloClientes);

        JPanel panel = new JPanel(new BorderLayout());
        panel.setBorder(BorderFactory.createTitledBorder("Lista de Clientes"));
        panel.add(new JScrollPane(tablaClientes), BorderLayout.CENTER);

        JButton btnRecargar = new JButton("Recargar Tabla");
        btnRecargar.addActionListener(e -> {
            modeloClientes.setRowCount(0);
            for (ClienteOtaku c : ClienteDAO.obtenerTodosLosClientes()) {
                Object[] fila = {
                    c.getDni(), c.getNombre(), c.getEmail(), c.getTelefono(), c.getFechaRegistro()
                };
                modeloClientes.addRow(fila);
            }
        });

        JPanel panelBoton = new JPanel(new FlowLayout(FlowLayout.CENTER));
        panelBoton.add(btnRecargar);
        panel.add(panelBoton, BorderLayout.SOUTH);

        // Cargar al iniciar
        btnRecargar.doClick();

        return panel;
    }

    private JPanel FormularioEditarCliente() {
        JPanel panel = new JPanel(new GridBagLayout());
        GridBagConstraints gbc = new GridBagConstraints();

        JTextField dniField = new JTextField(15);
        JTextField nombreField = new JTextField(15);
        JTextField emailField = new JTextField(15);
        JTextField telefonoField = new JTextField(15);
        JTextField fechaField = new JTextField(15);

        JButton btnBuscar = new JButton("Buscar");
        JButton btnActualizar = new JButton("Actualizar");

        gbc.insets = new Insets(10, 10, 10, 10);
        gbc.fill = GridBagConstraints.HORIZONTAL;

        String[] labels = {"DNI:", "Nombre:", "Email:", "Teléfono:", "Fecha Registro (yyyy-MM-dd):"};
        JTextField[] fields = {dniField, nombreField, emailField, telefonoField, fechaField};

        for (int i = 0; i < labels.length; i++) {
            gbc.gridx = 0; gbc.gridy = i;
            panel.add(new JLabel(labels[i]), gbc);
            gbc.gridx = 1;
            panel.add(fields[i], gbc);
        }

        JPanel botones = new JPanel(new FlowLayout(FlowLayout.CENTER));
        botones.add(btnBuscar);
        botones.add(btnActualizar);
        gbc.gridx = 0; gbc.gridy = labels.length;
        gbc.gridwidth = 2;
        gbc.fill = GridBagConstraints.NONE;
        panel.add(botones, gbc);

        btnBuscar.addActionListener(e -> {
            ClienteOtaku c = ClienteDAO.obtenerTodosLosClientes()
                .stream().filter(cli -> cli.getDni().equals(dniField.getText())).findFirst().orElse(null);
            if (c != null) {
                nombreField.setText(c.getNombre());
                emailField.setText(c.getEmail());
                telefonoField.setText(c.getTelefono());
                fechaField.setText(c.getFechaRegistro().toString());
            } else {
                JOptionPane.showMessageDialog(panel, "Cliente no encontrado", "Error", JOptionPane.ERROR_MESSAGE);
            }
        });

        btnActualizar.addActionListener(e -> {
            try {
                ClienteOtaku actualizado = new ClienteOtaku(
                    dniField.getText(),
                    nombreField.getText(),
                    emailField.getText(),
                    telefonoField.getText(),
                    java.sql.Date.valueOf(fechaField.getText())
                );
                if (ClienteDAO.actualizarCliente(actualizado)) {
                    JOptionPane.showMessageDialog(panel, "Cliente actualizado correctamente.");
                } else {
                    JOptionPane.showMessageDialog(panel, "Error al actualizar", "Error", JOptionPane.ERROR_MESSAGE);
                }
            } catch (Exception ex) {
                JOptionPane.showMessageDialog(panel, "Datos inválidos", "Error", JOptionPane.ERROR_MESSAGE);
            }
        });

        panel.setBorder(BorderFactory.createTitledBorder("Editar Cliente"));
        return panel;
    }

    private JPanel FormularioEliminarCliente() {
        JPanel panel = new JPanel(new GridBagLayout());
        GridBagConstraints gbc = new GridBagConstraints();

        JTextField dniField = new JTextField(15);
        JButton btnEliminar = new JButton("Eliminar");

        gbc.insets = new Insets(10, 10, 10, 10);
        gbc.fill = GridBagConstraints.HORIZONTAL;

        gbc.gridx = 0; gbc.gridy = 0;
        panel.add(new JLabel("DNI del cliente:"), gbc);
        gbc.gridx = 1;
        panel.add(dniField, gbc);

        JPanel botones = new JPanel(new FlowLayout(FlowLayout.CENTER));
        botones.add(btnEliminar);
        gbc.gridx = 0; gbc.gridy = 1;
        gbc.gridwidth = 2;
        panel.add(botones, gbc);

        btnEliminar.addActionListener(e -> {
            int confirmacion = JOptionPane.showConfirmDialog(panel, "¿Eliminar cliente?", "Confirmación", JOptionPane.YES_NO_OPTION);
            if (confirmacion == JOptionPane.YES_OPTION) {
                if (ClienteDAO.eliminarCliente(dniField.getText())) {
                    JOptionPane.showMessageDialog(panel, "Cliente eliminado correctamente.");
                } else {
                    JOptionPane.showMessageDialog(panel, "No se encontró el cliente", "Error", JOptionPane.ERROR_MESSAGE);
                }
            }
        });

        panel.setBorder(BorderFactory.createTitledBorder("Eliminar Cliente"));
        return panel;
    }

    private JPanel FormularioPedido() {
        JPanel panel = new JPanel(new BorderLayout());

        // Campo para el DNI del cliente
        JPanel topPanel = new JPanel(new FlowLayout());
        topPanel.add(new JLabel("DNI Cliente:"));
        JTextField dniField = new JTextField(10);
        topPanel.add(dniField);

        panel.add(topPanel, BorderLayout.NORTH);

        // Tabla de productos disponibles
        String[] columnas = {"ID", "Nombre", "Categoría", "Precio", "Cantidad"};
        DefaultTableModel modelo = new DefaultTableModel(columnas, 0);
        JTable tablaProductos = new JTable(modelo);

        // Cargar productos
        try {
            List<ProductoOtaku> productos = productoDAO.obtenerTodosLosProductos();
            for (ProductoOtaku prod : productos) {
                modelo.addRow(new Object[]{
                    prod.getId(), prod.getNombre(), prod.getCategoria(), prod.getPrecio(), 0
                });
            }
        } catch (Exception e) {
            JOptionPane.showMessageDialog(panel, "Error al cargar productos");
        }

        panel.add(new JScrollPane(tablaProductos), BorderLayout.CENTER);

        // Botón confirmar
        JButton btnConfirmar = new JButton("Confirmar Pedido");
        JPanel bottomPanel = new JPanel();
        bottomPanel.add(btnConfirmar);
        panel.add(bottomPanel, BorderLayout.SOUTH);

        // Acción del botón
        btnConfirmar.addActionListener(e -> {
            try {
                String dni = dniField.getText().trim();
                if (dni.isEmpty()) {
                    JOptionPane.showMessageDialog(panel, "DNI requerido.");
                    return;
                }

                PedidoOtaku pedido = new PedidoOtaku();
                pedido.setDniCliente(dni);
                pedido.setFecha(new java.sql.Date(System.currentTimeMillis()));

                List<DetallePedidoOtaku> detalles = new ArrayList<>();

                for (int i = 0; i < tablaProductos.getRowCount(); i++) {
                    int cantidad = Integer.parseInt(tablaProductos.getValueAt(i, 4).toString());
                    if (cantidad > 0) {
                        DetallePedidoOtaku det = new DetallePedidoOtaku();
                        det.setIdProducto((int) tablaProductos.getValueAt(i, 0));
                        det.setCantidad(cantidad);
                        det.setPrecio((double) tablaProductos.getValueAt(i, 3));
                        detalles.add(det);
                    }
                }

                if (detalles.isEmpty()) {
                    JOptionPane.showMessageDialog(panel, "Debe seleccionar al menos un producto.");
                    return;
                }

                pedido.setDetalles(detalles);

                // Guardar en la base de datos
                PedidoOtakuDAO pedidoDAO = new PedidoOtakuDAO(conn);
                int idPedido = pedidoDAO.registrarPedidoConDetalles(pedido);

                JOptionPane.showMessageDialog(panel, "Pedido registrado con ID: " + idPedido);
                dniField.setText("");
                for (int i = 0; i < tablaProductos.getRowCount(); i++) {
                    tablaProductos.setValueAt(0, i, 4); // reset cantidades
                }

            } catch (Exception ex) {
                JOptionPane.showMessageDialog(panel, "Error al registrar pedido: " + ex.getMessage());
            }
        });

        panel.setBorder(BorderFactory.createTitledBorder("Registrar Pedido"));
        return panel;
    }
    
    private JPanel FormularioMostrarPedidos() {
        JPanel panel = new JPanel(new BorderLayout());
        
        String[] columnas = {"ID", "Cliente", "Fecha", "Total"};
        Object[][] datosEjemplo = {
            {"1", "Goku", "2024-06-10", "59.99"},
            {"2", "Naruto", "2024-06-11", "89.00"},
        };

        JTable tablaPedidos = new JTable(datosEjemplo, columnas);
        JScrollPane scroll = new JScrollPane(tablaPedidos);

        panel.add(new JLabel("Lista de Pedidos:"), BorderLayout.NORTH);
        panel.add(scroll, BorderLayout.CENTER);

        return panel;
    }
    
    private JPanel FormularioEliminarPedido() {
        JPanel panel = new JPanel(new GridLayout(3, 1, 10, 10));

        JLabel label = new JLabel("ID del Pedido a eliminar:");
        JTextField campoID = new JTextField();
        JButton btnEliminar = new JButton("Eliminar");

        btnEliminar.addActionListener(e -> {
            String id = campoID.getText();
            if (id.isEmpty()) {
                JOptionPane.showMessageDialog(this, "Debes ingresar un ID.");
            } else {
                // Aquí deberías llamar al método DAO que elimina un pedido.
                JOptionPane.showMessageDialog(this, "Pedido con ID " + id + " eliminado (simulado).");
            }
        });

        panel.add(label);
        panel.add(campoID);
        panel.add(btnEliminar);

        return panel;
    }



    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> new MainGUI());
    }
}

