d1={}

while True:
    nombre=input("Dime un nombre añadir: ")
    
    if nombre=="fin":
       break

    elif nombre != "fin":
     numero=int(input(f"Dime el número de{nombre}: "))
     d1[nombre]= numero
    
print(f"Tus contactos son {d1} ")

nombre=(input("Dime el nombre de tu contacto"))

print(f"El numero  de {nombre} es {d1[nombre]}")
