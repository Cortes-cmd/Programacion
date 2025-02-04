"""Ejemplo 1: Contar hasta 10 con un bucle for"""

#for i in range (1, 11):
   # print(i)

"""Ejemplo 2: Sumar los números de una lista"""

#numeros = [1, 2, 3, 4, 5]

#suma= 0

#for numero in numeros:
  #  suma+= numero
#print("La suma es",suma)

"""Ejemplo 3: Encontrar el primer número divisible por 7"""

#for numero in range (1,100):
    #if numero %7 ==0:
        #print("El primer número divisible por 7 es", numero)
       # break

"""Ejemplo 4: Contar números pares con un bucle while"""

#contador = 0
#numero = 0

#while contador <5:
 #   if numero %2 ==0:
  #      print(numero)
   #     contador+=1
    #numero +=1

"""Ejercicio 1: Contar números pares"""

#numero=int(input("Dame un número entero positivo"))

#pares= 0
#i=0
#for i in range (1,numero+1):
   # if i %2==0:
      #  pares+=1
    #i+=1
#print(f"Los numeros son:{pares}")

"""Ejercicio 2: Suma de números hasta que se introduce un negativo"""

#print("Dame números enteros, usando negativos se finaliza la solicitud de números")
#suma=0
#while True:
 #   numero=int(input("Dame un número"))
  #  if numero >=0:
   #  suma= suma + numero
    #elif numero <=0:
     #  print(f"El resultado es{suma}")
      # break

"""Ejercicio 3: Tabla de multiplicar"""

#numero=int(input("Dame un número entero positivo"))

#if numero <0:
 #   print("El número no es válido")
#else:
 #   for i in range (1,11):
   #     resultado =numero * i
  #      print(f"{numero} x {i}  {resultado}")

"""Ejercicio 4: Adivinar un número"""

#import random
#numero1=random.randint(1,100)
 

#while True:
   # numero=int(input("Dime un número del 1 al 100 "))
  # if numero1 >numero:
   #     print("Demasiado bajo")
   # elif numero1< numero:
       # print("Demasiado alto")
  #  else:
        #print("Felicidades! Has acertado!")
    #    break

"""Ejercicio 5:Contar las vocales en una palabra"""

#Palabra=(input("Dame una palabra"))

#vocales=0

#for (letra) in (Palabra):
    
    #if letra== "a" or letra== "e" or letra== "i" or letra== "o" or letra=="u":
      #vocales+=1

#print(f"La palabra tiene {vocales} vocales")