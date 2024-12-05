alturas_metros = [1.60, 1.75, 1.80, 1.50]

def metros_a_centimetros (numero):
    return numero *100

print("Tus cm. a metros son; ",list(map(metros_a_centimetros,alturas_metros)))