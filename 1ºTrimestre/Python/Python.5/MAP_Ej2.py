Frases=["Un gran poder, conlleva una gran responsabilidad","Para un barco sin rumbo, ningun viento le es favorable","Cogito ergo sum"]

def Titulos_Frases (palabra):
    return palabra.title()

Frases_a_Titulos= list(map(Titulos_Frases,Frases))

print(Frases_a_Titulos)