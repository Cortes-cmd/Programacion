asignaturas=[]

d1={}
while True:

    asignatura=input("Qué asignatura tuviste, escribe fin para terminar")

    if asignatura!= "fin":

        calificacion= int((input("Dime qué nota sacaste")))

        d1[asignatura]= calificacion

        asignaturas.append(d1)
    
    elif asignatura== "fin":
        
         break
    
print(asignaturas)