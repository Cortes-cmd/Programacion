#Establezco los contadores para saldo, los ingresos , y las retiradas
saldo=0
float(saldo)
Ingresos_Totales=0
Retiradas_Totales=0

saldo=float(input("Cual es tu saldo inicial?\n"))

while True:
    #Introduzco la posibilidad de que se introduzca un número inválido
   if saldo <0:
        print("No es un valor valido")
    #Comienzo a utilizar las opciones del código una vez se introduce un dato válido
   elif saldo >=0:
     print("MENU:\n1.-Ingresar dinero\n2.-Retirar dinero\n3.-Mostrar saldo\n4.-Estadísticas\n5.-Salir")
     Opcion=int(input("Que opcion deseas? :\n"))
    #Aplico la opción de que introduzcan un número fuera del rango establecido
   if Opcion <1 or Opcion >5:
       print("No existe tal opcion")
    #Muestro la opción para introducir dinero sumando al posible valor previo de la variables "Ingresos_Totales"
   elif Opcion ==1:
       print("Has elegido; ""Ingresar dinero" )
       Ingreso=float(input("Cuanto dinero deseas ingresar?"))
       Ingresos_Totales= Ingreso + Ingresos_Totales
       saldo= saldo + Ingreso
       print(f"Tras el ingreso, tienes{saldo}")
    #Muestro la opción para Retirar dinero sumando al posible valor previo de la variables "Retiradas_Totales, si tratas de retirar más de la cantidad de saldo que posees, no te permite por estar en números rojos en tal supuesto"
   elif Opcion ==2:
       print("Has elegido; ""Retirar dinero" )
       Retiro=float(input("Cuanto dinero deseas retirar?"))
       Retiradas_Totales= Retiro + Retiradas_Totales
       if  Retiro > saldo:
        print("No puedes retirar mas dinero del que dispones")
       elif Retiro<= saldo:
        saldo= saldo - Retiro
        print(f"Ahora mismo dispones de {saldo} euros")
   elif Opcion ==3:
    #Coloco la opción para observar cuánto saldo tienes
       print(f"Posees{saldo}€")
   elif Opcion ==4:
    #Coloco la opción para observar cuántas retiradas e ingresos se han producido en total
       print("Has elegido estadísticas")
       print(f"Cantidades Ingresadas: {Ingresos_Totales}")
       print(f"Cantidades Retiradas: -{Retiradas_Totales}")
    #Permito salir del menú y termina el programa
   elif Opcion==5:
       print("A continuación, saldrás del programa")
       break