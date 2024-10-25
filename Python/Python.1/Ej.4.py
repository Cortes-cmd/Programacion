""""Ejercicio 4: Contar las vocales en una palabra"""

vocales="aeiou"

Palabra=(input("Dame una palabra"))

cvocales=0

for letra in (Palabra):
    if letra in vocales:
        cvocales+=1
print(f"La palabra contiene {cvocales} vocales")