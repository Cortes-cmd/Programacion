nombres=[]


while True:


    nombre=input("Inserta nombres, dejaran de ingresarse, escribiendo " "fin ")




    if nombre=="fin":
       break


    nombres.append(nombre)


print(f"Los nombres ingresados son: {nombres}")


print(f"Lista de nombres:")


for nombre in nombres:
   
   print(f"- {nombre}")
