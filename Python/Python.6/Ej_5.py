tareas =[]

def añadir_tarea ():
    while True:
        ntarea=input("Cuál es la tarea que quiere añadir? \n")
        urgencia=input("La tarea es urgente? ; Si/No ?: \n").lower()
        if urgencia == "si":
            tarea_urgente={
            "Nombre": ntarea,
            "Urgencia": True
            }
            tareas.append(tarea_urgente)
        elif urgencia == "no":
            tarea_sin_prisa={
            "Nombre": ntarea,
            "Urgencia": False
            }
            tareas.append(tarea_sin_prisa)
        detener=input("Deseas detener la introducción de tareas? Si/No ; \n").lower()
        if detener == "si":
           break

añadir_tarea()

def tareas_urgentes (tarea):
   return tarea["Urgencia"]

Tareas_urgentes= list(filter(tareas_urgentes,tareas))

print("Las tareas urgentes son las siguientes: \n")

for tarea in Tareas_urgentes:
   print(tarea["Nombre"],"\n")