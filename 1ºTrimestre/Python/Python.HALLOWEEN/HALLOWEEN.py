from random import randint

print("!Bienvenido a la caza de monstruos de Halloween!")

monstruos = [
{"Nombre": "Vampiro", "Dificultad":3},
{"Nombre": "Momia", "Dificultad":2},
{"Nombre": "Bruja", "Dificultad":4},
{"Nombre": "Esqueleto", "Dificultad":1},
{"Nombre": "Fantasma", "Dificultad":5},

]

objetos=["Estaca","Pocion magica","hechizo"]

smonstruo=randint(0,4)

spawned_monstruo= monstruos[smonstruo]

nombre_monstruo= spawned_monstruo["Nombre"]

dificultad=spawned_monstruo["Dificultad"]

intentos=3

print(f"Ha aparecido un/a {nombre_monstruo} con dificultad {dificultad}!\n Tienes {intentos} intentos para capturarlo")

def captura_monstruo():
    intentos=3

    while True:
        Eobjeto=input(f"Elige un objeto para capturarlo!: {objetos} \n").lower()

        if smonstruo == 0 and Eobjeto =="estaca":
            Turno_Monstruo = randint(1,130)-40
        elif smonstruo == 0 and Eobjeto !="estaca":
             Turno_Monstruo = randint(1,130)

        elif smonstruo == 1 and Eobjeto == "pocion magica":
            Turno_Monstruo = randint(1,120)-30
        elif smonstruo == 1 and Eobjeto !="pocion magica":
             Turno_Monstruo = randint(1,120)

        elif smonstruo == 2 and Eobjeto == "estaca":
            Turno_Monstruo = randint(1,140)-50    
        elif smonstruo == 2 and Eobjeto !="estaca":
             Turno_Monstruo = randint(1,140)

        elif smonstruo == 3 and Eobjeto == "hechizo":
            Turno_Monstruo = randint(1,110)-20
        elif smonstruo == 3 and Eobjeto !="hechizo":
             Turno_Monstruo = randint(1,110)

        elif smonstruo == 4 and Eobjeto == "hechizo":
            Turno_Monstruo = randint(1,150)-60
        elif smonstruo == 4 and Eobjeto !="hechizo":
             Turno_Monstruo = randint(1,150)
             
        Turno_Jugador= randint(1,120)

        if Turno_Jugador > Turno_Monstruo:
               print(f"Has capturado a una {nombre_monstruo} con un/a {Eobjeto}")
               break
        else:
               intentos-=1
               print(f"Fallaste al intentar capturar al {nombre_monstruo} con {Eobjeto} !, te quedan {intentos} intentos\n")
        if intentos == 0:
           print("El monstruo ha escapado, mejor suerte la próxima vez")
           break
               



captura_monstruo()
    