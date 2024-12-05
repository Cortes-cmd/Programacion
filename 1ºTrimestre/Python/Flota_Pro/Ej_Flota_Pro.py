import numpy as np

# Crear un tablero vacío de 20x20
def crear_tablero():
    return np.zeros((20, 20), dtype=int)

def colocar_barco(tablero, longitud):
    """
    Intenta colocar un barco de longitud especificada en una posición aleatoria
    de manera que no se sobreponga ni se salga del tablero.
    """
    colocado = False
    
    while not colocado:
        # Elegir aleatoriamente una orientación (horizontal o vertical)
        orientacion = np.random.choice(['horizontal', 'vertical'])

        if orientacion == 'horizontal':
            # Elegir fila aleatoria
            fila = np.random.randint(0, 20)
            # Elegir columna aleatoria donde el barco quepa
            columna = np.random.randint(0, 20 - longitud)
            
            # Verificar que las posiciones estén libres
            if np.all(tablero[fila, columna:columna+longitud] == 0):
                # Colocar el barco
                tablero[fila, columna:columna+longitud] = 1
                colocado = True
        
        elif orientacion == 'vertical':
            # Elegir columna aleatoria
            columna = np.random.randint(0, 20)
            # Elegir fila aleatoria donde el barco quepa
            fila = np.random.randint(0, 20 - longitud)
            
            # Verificar que las posiciones estén libres
            if np.all(tablero[fila:fila+longitud, columna] == 0):
                # Colocar el barco
                tablero[fila:fila+longitud, columna] = 1
                colocado = True
    return tablero

def disparar(tablero, fila, columna, tablero_visible):
    """
    Realiza un disparo en las coordenadas (fila, columna).
    Si el disparo acierta en un barco, marca la casilla como tocada.
    Si no acierta, marca la casilla como agua tocada.
    """
    if tablero[fila, columna] == 1:
        print(f"¡Acertaste! Barco tocado en ({fila}, {columna})")
        tablero[fila, columna] = 3 # Marca el barco como tocado
        tablero_visible[fila, columna] = 3 # Lo mostramos como barco tocado
    elif tablero[fila, columna] == 0:
        print(f"¡Agua! No hay barco en ({fila}, {columna})")
        tablero[fila, columna] = 2 # Marca como agua tocada
        tablero_visible[fila, columna] = 2 # Lo mostramos como agua tocada

def guardar_partida(tablero, archivo="partida_comenzada.txt"):
    """Guarda el estado del tablero en un archivo"""
    np.savetxt(archivo, tablero, fmt='%d')
    print("Partida guardada.")

def cargar_partida(archivo="partida_comenzada.txt"):
    """Cargar el estado del tablero desde un archivo"""
    try:
        tablero = np.loadtxt(archivo, dtype=int)
        print("Partida cargada.")
        return tablero
    except FileNotFoundError:
        print("No se encontró ninguna partida guardada.")
        return None # Si no hay partida, retornamos None.

def verificar_victoria(tablero):
    """Verifica si todos los barcos han sido hundidos (todas las casillas marcadas como 3)"""
    if np.all(tablero != 1): # No quedan partes del barco (1) en el tablero
        return True
    return False

def mostrar_tablero(tablero_visible):
    """Mostrar solo las casillas tocadas (agua tocada o barco tocado)"""
    # Mostramos sólo las casillas tocadas o fallidas, no las del barco
    print("\nTablero actual:")
    tablero_visible[tablero_visible == 0] = -1 # Ocultar las casillas vacías
    print(tablero_visible)

def mostrar_menu():
    """Muestra las opciones cuando el jugador elige '111'"""
    print("\n1. Guardar partida")
    print("2. Salir")

def manejar_opciones(tablero):
    """Función que maneja las opciones del jugador al introducir '111'"""
    opcion = input("Introduce '111' para acceder al menú: ")
    if opcion == '111':
        mostrar_menu()
        eleccion = input("Elige una opción: ")
        if eleccion == '1':
            guardar_partida(tablero)
        elif eleccion == '2':
            print("Saliendo del juego.")
            return False # Salir del juego
        return True # Continuar jugando
    return True # Continuar jugando

def jugar():
    # Intentamos cargar una partida guardada
    tablero = cargar_partida()
    
    # Si no se cargó una partida, generamos un nuevo tablero
    if tablero is None:
        tablero = crear_tablero()
        tablero = colocar_barco(tablero, 4) # Barco de 4
        tablero = colocar_barco(tablero, 3) # Barco de 3
        tablero = colocar_barco(tablero, 2) # Barco de 2
    
    # Crear tablero visible, que solo tiene agua tocada o barco tocado
    tablero_visible = np.zeros_like(tablero)
    
    # Loop principal del juego
    while True:
        mostrar_tablero(tablero_visible) # Mostrar solo las casillas tocadas
        fila = int(input("Introduce la fila para disparar (0-19): "))
        columna = int(input("Introduce la columna para disparar (0-19): "))
        
        disparar(tablero, fila, columna, tablero_visible)
        
        if verificar_victoria(tablero):
            print("¡Felicidades! Has hundido todos los barcos.")
            guardar_partida(tablero)
            break
        
        if not manejar_opciones(tablero):
            break # Si el jugador elige salir, salimos del juego

# Iniciar el juego
jugar()