empleados =[]

def añadir_empleado ():
    while True:
        nempleado=input("Cómo se llama el empleado que quieres añadir? \n")
        estado_laboral=input("Se encuentra; Activo ó Inactivo ?: \n").lower()
        if estado_laboral == "activo":
            empleado_activo={
            "Nombre": nempleado,
            "estado_laboral": True
            }
            empleados.append(empleado_activo)
        elif estado_laboral == "inactivo":
         empleado_inactivo={
            "Nombre": nempleado,
            "estado_laboral": False
         }
         empleados.append(empleado_inactivo)
        detener=input("Deseas detener la introducción de empleados? Si/No ; \n").lower()
        if detener == "si":
           break

añadir_empleado()

def empleados_Activos (empleado):
   return empleado["estado_laboral"]

empleados_activos= list(filter(empleados_Activos,empleados))

print("Los empleados activos son los siguientes: \n")

for empleado in empleados_activos:
   print(empleado["Nombre"],"\n")