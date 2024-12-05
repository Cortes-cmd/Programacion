#EJERCICIO 1
#numeros= [5, 15, 25, 35, 45]

#suma = 0
#for numero in numeros:
#    suma+=numero

#print(suma)

#promedio= suma/len(numeros)

#print(promedio)

#numeros_mayores=[]

#for numero in numeros:
#    if numero > promedio:
#        numeros_mayores.append(numero)
#print(numeros_mayores)

#print=(f"El promedio de los números es {promedio}")

#EJERCICIO2

#edades=[14,21,18,17,30,25]

#def es_mayor_de_edad(edad):
#    return edad >=18

#mayores=list(filter(es_mayor_de_edad,edades))

#print(mayores)

#EJERCICIO3

#def es_par(numero):
#    return numero %2==0
         
    
      

#numeros=[8,15,22]

#print(es_par(8))
#print(es_par(15))
#print(es_par(22))

#EJERCICIO4

#from math import sqrt

#def raiz_cuadrada (numero):
#    return sqrt(numero)

#numeros=[4,9,16,25,36]

#raices = list(map(raiz_cuadrada,numeros))

#print(raices)

#EJERCICIO5

#electricidad=int(input("Dame el gasto de electricidad"))

#agua=int(input("Dame el gasto de agua"))

#gas=int(input("Dame el gasto de gas"))

#comida=int(input("Dame el gasto de comida"))

#Gastos=[]



#Gastos.append(electricidad)
#Gastos.append(agua)
#Gastos.append(gas)
#Gastos.append(comida)

#Gastos_Totales=sum(Gastos)

#if Gastos_Totales >500:
#    print("Demasiados gastos")
#else:
#    print("Wachi pistachi")

#EJERCICIO6

#numeros=[9,18,25,30,42]

#contador= 0

#for numero in numeros:

#    if numero %3 == 0:
#        contador +=1

#print(contador)

#PREGUNTA 9

#ventas=[100,200,300,150,50]

#Ventas_M=[]

#for venta in ventas:
#    if venta>=100:
#        Ventas_M.append(venta)  
    
#Ventas_Menores=[]

#for venta in ventas:
#    if venta<=100:
#        Ventas_Menores.append(venta)

#print(Ventas_Menores)


#Ventas_Mayores=sum(Ventas_M)

#print(Ventas_Mayores)
    
#PREGUNTA 10


#temperaturas= [15.5,20.3,18.2,25.0,30.5]

#temp=0

#def convertir_a_fahrenheit(n1):
#     temp= n1*1.8 +32
#     return temp

#fahrenheit= list(map(convertir_a_fahrenheit,temperaturas))

#print(fahrenheit)

#PREGUNTA 11

#def es_multiplo_de_tres(numero):
#    return numero %3==0

#numeros=[12,14,18]

#print(es_multiplo_de_tres(12))
#print(es_multiplo_de_tres(14))
#print(es_multiplo_de_tres(18))

#PREGUNTA 12

#def es_mayor_a_20(temperatura):
#    return temperatura >20

#temperaturas= [15.5,20.3,18.2,25.0,30.0]

#mayores_a_20= list(filter(es_mayor_a_20,temperaturas))

#print(list(mayores_a_20))

#PREGUNTA 13

#ingreso1=int(input("Dame el ingreso"))
#ingreso2=int(input("Dame el ingreso"))
#ingreso3=int(input("Dame el ingreso"))

#Ingresos=[]

#Ingresos.append(ingreso1)
#Ingresos.append(ingreso2)
#Ingresos.append(ingreso3)

#Ingresos_T=sum(Ingresos)

#gasto1=int(input("Dame el gasto"))
#gasto2=int(input("Dame el gasto"))
#gasto3=int(input("Dame el gasto"))

#Gastos=[]

#Gastos.append(gasto1)
#Gastos.append(gasto1)
#Gastos.append(gasto1)

#Gastos_T=sum(Gastos)

#Balance=Ingresos_T - Gastos_T

#print(Balance)

#PREGUNTA 14

#palabras= ["hola","mundo","Python","programacion"]

#maxima=0


#for palabra in palabras:
#    if len(palabra) >maxima:
#        maxima = (len(palabra))

#print(palabra)

