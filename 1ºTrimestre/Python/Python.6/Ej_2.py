vehiculos=[

]

def añadir_carro ():
      while True:
            Nombre=input("Que coche quieres introducir?\n").lower()
            Revision=input("Ha pasado alguna revision? si/no \n").lower()
            if Revision == "si":
             Tvehiculos_info={
                "Nombre":Nombre,

                "Revision": True
            }
             vehiculos.append(Tvehiculos_info)
            elif Revision =="no":
             Fvehiculos_info={
                "Nombre": Nombre,
                "Revision":False
            }
             vehiculos.append(Fvehiculos_info)
            detencion=input("Quieres dejar de añadir coches?" "si/no \n").lower()
            if detencion == "si":
                 break
      
      
    
añadir_carro()

def carros_sin_revision (vehiculo):
   return vehiculo["Revision"]== False   

vehiculos_sin_revision= list(filter(carros_sin_revision,vehiculos))

print("Los nombres de los vehiculos que no pasaron la revision, son; \n ")

for vehiculo in vehiculos_sin_revision:
    print(vehiculo["Nombre"], "\n")