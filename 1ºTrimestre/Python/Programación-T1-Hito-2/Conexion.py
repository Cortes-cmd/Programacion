#IMPORTO DESDE CONEXIÓN PADRE LAS FUNCIONES DE CONEXION
import Conexion_Padre as bdd
#USO CONEXIÓN PARA CONECTARME A BD
conexion=bdd.conectar("SUPERMERCADOPython")
#EMPLEO CURSOR PARA EJECUTAR
cursor= conexion.cursor()

