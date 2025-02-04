Frase=("La vida es como una caja de bombones")



def contar_vocales (frase):
    vocales="aeiou"
    cvocales=0
    for frase in Frase:
     if frase in vocales:
        cvocales+=1
    return cvocales
    
print("Las vocales de tu frase son: ", contar_vocales(Frase))