import numpy as np

matriz= np.random.randint(1,51, size=(4,3))

matriz_max=np.max(matriz, axis=0)

print(matriz_max)