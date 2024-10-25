"""Ejercicio 1 """

#edad= int(input("Cuántos años manejas"))

#if edad <5:
   # print("Tu entrada es gratuita")
#elif edad >=5 or edad<=12:
   # print("Tu entrada cuesta 5 euros")
#elif edad >=13 or edad <=17:
    #print("Tu entrada cuesta 7 euros")
#elif edad >=18:
    #print("Tu entrada cuesta 10 euros")

""" Ejercicio 2"""

#nota=int(input("Qué nota sacaste?"))

#if nota >=90:
   # print("La calificación es A")
#elif nota>=80 and nota<90:
    #print("La calificación es B")
#elif nota>=70 and nota<80:
   # print("La calificación es C")
#elif nota>=60 and nota<70:
# print("La calificación es D")
#elif nota<60:
   # print("La calificación es F")

"""Ejercicio 3 """

#numero= int(input("Qué número ocupa tu día de la semana?"))

#match numero:

    #case 1:
       # print("Lunes")
   # case 2:
      #  print("Martes")
   # case 3:
      #  print("Miércoles")
    #case 4:
       # print("Jueves")
   # case 5:
       # print("Viernes")
   # case 6:
       # print("Sábado")
   # case 7:
        #print("Domingo")
#if numero <1 or numero >7:
   # print("No existe ese día")

"""Ejercicio 4 """

""""
edad= int(input("Cuántos años tienes?"))

if edad<12:
    print("Niño")
elif edad >=12 and edad <=17:
    print("Adolescente")
elif edad >=18 and edad <=59:
    print("Adulto")
elif edad >=60:
    print("Adulto mayor")

    idioma= (input("Qué idioma hablas?"))
match idioma:
    case "Español":
        print("Has seleccionado el idioma Español")
    case "English":
        print("You have selected English")
    case "Français":
        print("Vous avez sélectionné le français")
    case _:
        print("Idioma no soportado")
"""

"""Ejercicio 5"""

movil=input("Cuál es tu vehículo ")

if movil == "coche":
    print("Vehículo de cuatro ruedas")
elif movil == "moto":
    print("Vehículo de dos ruedas")
elif movil == "bicicleta":
    print("Vehículo no motorizado")
else:
    print("Vehículo no reconocido")

color=input("Cuál es tu color preferido ")

match color :

    case "rojo":
        print("Has seleccionado el color rojo")
    case "azul":
        print("Has seleccionado el color azul")
    case "verde":
        print("Has seleccionado el color verde")
    case _ :
        print("El color no está disponible")




