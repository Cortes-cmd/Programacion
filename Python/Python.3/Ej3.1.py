
canciones=[]

nombres=""

while True:

    if nombres!="fin":
     nombres=input("Dime qué canciones quieres añadir, se calculará la lista al recibir"" fin ")

    if nombres!="fin":
       canciones.append(nombres)

    if nombres=="fin":
        break



print(f"Tu lista de canciones es:{canciones}")

for i in range (len(canciones)):
   print(f" {i + 1}.-{canciones[i]}")
   


n_cancion=int(input("Dime el número de la cancion para reproducirla"))

print(f"Reproduciendo cancion: {[n_cancion]} .- {canciones[n_cancion - 1]}")



