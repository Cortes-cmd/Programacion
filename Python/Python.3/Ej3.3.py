itinerario=("Madrid", "Barcelona","Valencia","Sevilla")

for i in range(len(itinerario)):
 print(f"Destinos: {i +1} -- {itinerario[i]}")

ubicacion=int(input("Ingresa un numero para conocer la ciudad: "))

print(f"El numero {ubicacion} corresponde a {itinerario[ubicacion -1 ]}")
    