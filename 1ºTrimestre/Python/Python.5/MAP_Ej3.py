numeros=[10,20,25,35,43]

def numeros_doble (numero):
    return numero *2

numeros_multiplicados= list(map(numeros_doble,numeros))

print(numeros_multiplicados)