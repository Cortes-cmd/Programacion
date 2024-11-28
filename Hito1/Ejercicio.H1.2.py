#Establezco el import para que la maquina pueda seleccionar un nrandom, los contadores de ambos, máquina y jugador, la lista de las opciones y pregunto el nombre para hacerlo un tanto más personalizado
import random
Opciones=["Piedra", "Papel", "Tijera"]
c_maquina = 0
c_jugador= 0
print("Bienvenido, te informo de que el primero que consiga 3 victorias ganará, suerte")
nombre=input("Cual es tu nombre, jugador? \n")
while True:
#Aquí el objetivo de meterlos al inicio es que antes de preguntarse los posibles resultados revise si alguno de los dos ha llegado al tope de victorias acumuladas
    if c_maquina ==3:
        print("!La ganadora es la maquina! Mejor suerte la proxima vez")  
        break

    elif c_jugador ==3:
        print(f"!Enhorabuena {nombre}! !Has ganado!")  
        break

    P_maquina=random.randint(1,3)
    print("***Ejecucion iniciada***")
    P_jugador=int(input("Elige; 1-Piedra| 2-Papel | 3-Tijera \n"))
    print(f"{nombre} ha seleccionado; {Opciones[P_jugador-1]}")
    print(f"La máquina  ha seleccionado; {Opciones[P_maquina-1]}")

    #Hago una secuencia de todos los posibles empates
    if P_jugador == P_maquina:
        print("Habeis empatado esta ronda, suerte en la siguiente")
    #Hago una secuencia de todas las posibles victorias donde el jugador usa Piedra. Aquí empiezo a aumentar la puntuación en el contador de aquel que gane en el enfrentamiento
    elif (P_jugador == 1 and P_maquina == 2)  or (P_jugador == 2 and P_maquina == 3) or (P_jugador == 3 and P_maquina == 1): 
        print("!Punto para la maquina!")
        c_maquina +=1
    elif (P_jugador == 1 and P_maquina == 3) or (P_jugador == 2 and P_maquina == 1) or (P_jugador == 3 and P_maquina == 2):
        print(f"!Punto para {nombre}!")
        c_jugador +=1
    #Inserto la posibilidad de que me introduzcan un valor invalido para devolverlo al menu y que comience de 0, hasta que juegue según las reglas
    elif P_jugador <1 or P_jugador >3:
        print("Ese valor no esta recogido como posible en las reglas de este juego")
