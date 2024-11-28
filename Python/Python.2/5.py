numeros=[]


while True:


    entrada=(input("Dame un numero"))


    if entrada=="hecho":
        break


    numeros.append(int(entrada))


Nmax=0


for numero in numeros:
    if numero> Nmax:
        Nmax = numero
print(f"El numero mayor es{Nmax}")
