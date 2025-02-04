n1= input("Dime el primer número")
n2= input("Dime el segundo número")

Operación= input("Qué querrías hacer con estos números?")

n1= int(n1)
n2= int(n2)

if Operación == "suma":
    suma = n1 + n2
    print(suma)
elif Operación == "resta":
    resta = n1 - n2
    print(resta)
elif Operación == "multiplicación":
    multiplicación = n1 * n2
    print(multiplicación)
elif Operación == "división":
    if n2 == 0:
        print("No es posible realizar esta operación")
    else:
        division= n1 / n2
        print(division)





