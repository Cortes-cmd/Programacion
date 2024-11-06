import numpy as np

tablero=np.zeros((20,20),dtype=int)

tablero_vacio=np.zeros((20,20))

Pfila=np.random.randint(1,20)   
Pcolumna=np.random.randint(1,20)
tablero[Pfila,Pcolumna]= 1
barco=tablero

#depositar barcos
def barco1():
    Pfila=np.random.randint(1,20)   
    Pcolumna=np.random.randint(1,20)
    barco[Pfila,Pcolumna]=1
   #SS if barco= []



Posicion = Pfila, Pcolumna


print(tablero_vacio,"\n")

print(barco)

intentos=0

while True:

    Fataque=int(input("Dime la fila donde quieres atacar\n"))

    Cataque=int(input("Dime en qué columa deseas realizar el ataque\n"))

    if barco[Fataque -1,Cataque -1]== 1:
        print(f"!Has hundido el barco!, necesitaste {intentos} intentos para ello\n")
        break
    elif tablero_vacio[Fataque -1,Cataque -1]==0:
        print("Agua")
        tablero_vacio[Fataque -1,Cataque -1]=-1
        print(tablero_vacio)
        intentos +=1
    else: 
        print("Ya has disparado en esta posición")
