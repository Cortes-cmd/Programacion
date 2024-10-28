libros =[]

def añadir_libro ():
    while True:
        nlibro=input("Cómo se llama el libro que quieres añadir? \n")
        genero=input("Qué género es? Nuestras opciones son : Novela, Ensayo, y Poesia \n").lower()
        if genero == "novela":
            novelas={
            "Nombre": nlibro,
            "Genero": "novela"
            #"Novela": True
            }
            libros.append(novelas)
        elif genero == "ensayo":
         ensayos={
            "Nombre": nlibro,\
            "Genero": "ensayo"
            #"Ensayo": True
         }
         libros.append(ensayos)
        elif genero == "poesia":
         Poesía={
            "Nombre": nlibro,
            "Genero": "poesia"
            #"Poesía": True
         }
         libros.append(Poesía) 
        detener=input("Deseas detener la introducción de libros? Si/No ; \n").lower()
        if detener == "si":
           break

añadir_libro()

def Libros_Novelas (libro):
   return libro["Genero"] == "novela"

Novelas= list(filter(Libros_Novelas,libros))

print("Las novelas disponibles son las siguientes: \n")

for novela in Novelas:
   print(novela["Nombre"],"\n")