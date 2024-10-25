productos=[]


def añadir_producto (productos):
   while True:
      producto= input("Añade un producto")
      producto["Nombre del producto"].lower()
      perecedero=input("Es perecedero?").lower()
      if perecedero == "si":
          p_perecedero={
             "Nombre": producto,
             "perecedero": True
         }
          productos
          return True
          
         
      elif perecedero =="no":
         productos["Perecedero"]= True
         productos["Perecedero"]= False
      Detener=input("Quieres detener la inclusion de productos a la lista?\n")
      if Detener.lower()=="no":
         añadir_producto(productos)
      if Detener.lower() =="si":
       break
   return productos

while True:
   Detener=input("Quieres detener la inclusion de productos a la lista?\n")
   if Detener.lower()=="no":
      añadir_producto(productos)
   if Detener.lower() =="si":
      break
   
print(dict(filter(añadir_producto,productos )))



