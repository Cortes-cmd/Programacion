#utilidades.py

def convertir_a_mayusculas(texto):
    #Convierte el texto a mayúsculas
    return texto.upper()

def convertir_a_minusculas(texto):
    #Convierte el texto a minúsculas
    return texto.lower()

def es_palindromo(texto):
    #Devuelve True si el texto es un paíndromo, False en caso contrario.
    texto= texto.replace("","").lower() #Elimina espacios y convierte a minusculas

    return texto== texto[::-1]

# programa_texto.py

import utilidades

#Solicitar texto al usuario
texto=input ("Introduce un texto:")

#Utilizar las funciones importadas
print("Texto en mayúsculas:", utilidades.convertir_a_mayusculas(texto))

print("Texto en minúsculas:", utilidades.convertir_a_minusculas(texto))

if utilidades.es_palindromo(texto):
    print("El texto es un palíndromo")
else:
    print("El texto no es un palíndromo")