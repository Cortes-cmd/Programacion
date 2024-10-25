incognita = input("Cuál es la incógnita que deseas calcular")

if incognita == "a":
    b = input("Escribe b")
    b = int(b)
    c = input("Escribe c")
    c = int(c)
     
    from math import sqrt
    a = sqrt(b**2 - c**2)
    print (a)

elif incognita == "b":
    a = input("Escribe a")
    a = int(a)
    c = input("Escribe c")
    c = int(c)
     
    from math import sqrt
    b = sqrt(a**2 - c**2)
    print (b)

elif incognita == "c":
    b = input("Escribe b")
    b = int(b)
    a = input("Escribe a")
    a = int(a)

    from math import sqrt
    c = sqrt(b**2 - a**2)
    print (c)