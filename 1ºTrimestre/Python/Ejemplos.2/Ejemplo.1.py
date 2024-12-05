####################################
"""
def area_triangulo(base,altura):
    return (base * altura) /2

num1=int(input("Dame el número 1\n"))
num2=int(input("Dame el número 2\n"))



print(f"El resultado es: {area_triangulo(num1,num2)}")
########################################################
"""
#Ejemplo 2: Función que verifica si un número es par#
"""
def es_par(num):
    if num % 2==0:
     valor=True
    else:
     valor=False
    return valor

num1=int(input("Dame un número"))

if es_par(num1):
   print("Es par")
else:
   print("Es impar")
"""

#Ejemplo 3: Función que saluda de manera personalizada

def saludo_personalizado(nombre, hora_del_dia):
    if hora_del_dia =="mañana":
        print("¡Buenos días,"+ nombre+ "!")
    elif hora_del_dia =="tarde":
        print("¡Buenas tardes," + nombre+"!")
    else:
        print("!Buenas noches" +nombre + "!")
