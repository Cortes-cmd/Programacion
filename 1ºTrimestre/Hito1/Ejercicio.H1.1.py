
#Coloco un espacio para que tend
asterisco=" * "

while True:

   print("MENÚ\n1.- Cuadrado\n2.- Rectángulo\n3.- Salir\n")

   Figura= int(input("Dime qué figura deseas seleccionar"))
   if Figura== 1:
      print("Has seleccionado un cuadrado")
      l=int(input("Cuál es su lado?"))
   #Establezco con un bucle for una iteración de los números previos a la cifra ingresada en "l" para que printee "l" "*" "l" veces 
      for i in range (1,l+1):
         print(asterisco*l)
      area= l*l
      print(f"Su área es: {area}")
      perimetro= l+l+l+l
      print(f"Su perímetro es: {perimetro}")
   elif Figura == 2:
      print("Has seleccionado un rectángulo")
   #Pido base y altura para, además de realizar la operación, printear los "*" correspondientes
      base=int(input("Dime la base del rectángulo"))
      altura=int(input("Dime la altura del rectángulo"))
   #Selecciono base para decidir cuántas ocasiones printearé "*" tantas veces como "base" marque que debo hacerlo
      for i in range (1,altura +1):
         print(asterisco*base)
      area= base * altura
      print(f"El área es {area}")
      perimetro= (base + altura) *2
      print(f"El perímetro es {perimetro}")
   #Añado la posibilidades de que en el input aparezcan otras opciones que no están recogidas
   elif Figura < 1 or Figura > 3 :
      print("No existe tal figura")
   elif Figura ==3:
      break
