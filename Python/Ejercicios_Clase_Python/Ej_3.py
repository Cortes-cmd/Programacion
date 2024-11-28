
from random import randint


Numeros=[]

def generar_pares ():
    
    for _ in range(0,50):
        numero=randint(0,50)
        if numero %2 == 0:
            Numeros.append(numero)
    return(Numeros)

print(generar_pares())


 