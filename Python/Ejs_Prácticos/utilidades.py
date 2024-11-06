
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