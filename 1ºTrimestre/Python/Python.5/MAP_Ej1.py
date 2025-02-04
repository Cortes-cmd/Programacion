numeros=[1,5,10,15,20,25]

def sumar_5(numero):
    return numero +5

numeros_sumados= list(map(sumar_5,numeros))

print(numeros_sumados)