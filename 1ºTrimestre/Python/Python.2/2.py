Datos= ""


cnumeros=0


suma=0


while Datos!=0:


    Datos=int(input("Dame los numeros para calcular el promedio, cuando introduzcas 0, se calculara "))


    if Datos!=0:
       
     cnumeros+=1
    suma= Datos + suma


promedio = suma /cnumeros


print(f"El promedio de tus numeros es {promedio}")
