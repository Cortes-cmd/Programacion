numeros=[10.5,45.78,99.54,77.23]

def redondeo_numeros (numero):
    return round(numero)

numeros_redondeados= list(map(redondeo_numeros,numeros))

print(numeros_redondeados)