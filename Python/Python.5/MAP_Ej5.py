palabras=["Papanatas","Romulo","Ramita","Bazooka","Sidreria"]

def palabra_longitud (palabra):
    return len(palabra)

palabras_medidas= list(map(palabra_longitud,palabras))

print(palabras_medidas)