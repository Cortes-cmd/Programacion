#Funciones en python
#Todas las funciones comienzas por la palabras reservada"def
#Vamos  a intentar definir todas nuestras funciones en la parte superior de nuestro archivo
#Las funciones se componen de la palabra reservada "ref", un nombre y unos paréntesis
'''
def suma():
    suma = 2 + 3
    print(f"La suma es: {suma}")

def resta():
    resta= 2 - 3
    print(f"La resta es: {resta}")

def multiplicación():
    multiplicación = 2 * 3
    print(f"La mutiplicación es: {multiplicación}")

def división():
    división= 2 / 3
    print(f"La división es: {división}")

#Realmente nuestro programa principal o main, comienza aquí

suma()
resta()
división()
multiplicación()

##########################################################################

def sumapro(numero1, numero2):
    suma= numero1 + numero2
    print(f"La suma de {numero1} y {numero2} es {suma}")


#comienzo mi programa

num1= int(input("Dame el primer número: "))
num2=int(input("Dame el segundo número: "))

sumapro(num1,num2)

def restapro(numero1, numero2):
    resta = numero1-numero2
    print(f"La resta de {numero1} y {numero2} es {resta}")

###########################################################################
n1=int(input("Dame un número\n"))
n2=int(input("Dame un número\n"))

restapro(n1,n2)

############################################################################

def divisiónpro(numero1, numero2):
    división= numero1 / numero2
    print(f"La división de {numero1} y {numero2} es {división}")

############################################################################

n1=int(input("Dame un número\n"))
n2=int(input("Dame un número\n"))

divisiónpro(n1,n2)

def multiplicaciónpro(numero1, numero2):
    multiplicación= numero1 * numero2
    print(f"La multiplicación de {numero1} y {numero2} es {multiplicación}")

################################################################################

n1=int(input("Dame un número\n"))
n2=int(input("Dame un número\n"))

multiplicaciónpro(n1,n2)
############################################################################
def sumapro2(numero1, numero2):
    suma= numero1 + numero2
    return suma

n1=int(input("Dame un número\n"))
n2=int(input("Dame un número\n"))

resultadosuma= sumapro2(n1,n2)
print(f"El resultado de la suma es {resultadosuma}")

#########################################################################
'''
def espar(numero):
    if numero % 2 == 0 :
        valor=True
    else:
        valor=False
    return valor

num1=int(input("Dame un número para ver si es par"))
num2=int(input("Dame un número para ver si es par"))
num3=int(input("Dame un número para ver si es par"))

if espar(num1):
    print(f"El número {num1}es par")
else:
    print(f"El número {num1} es impar")

if espar(num2):
    print(f"El número {num2}es par")
else:
    print(f"El número {num2} es impar")

if espar(num3):
    print(f"El número {num3}es par")
else:
    print(f"El número {num3} es impar")