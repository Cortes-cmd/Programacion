import random

n1=random.randint(1,100)


numero=0

while n1!=numero:
 
 numero=int(input("Dame un numero"))

 if n1<numero:
    print("demasiado alto")
 elif n1>numero:
    print("demasiado bajo")
 else:
    print("Enhorabuena! Has acertado")
