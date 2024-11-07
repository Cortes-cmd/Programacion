
import Conexion as Cx

import Menu_Main as Mm

import Menu_Categoria as Mc

import Menu_Producto as Mp



conexion=Cx.conexion

cursor=Cx.cursor

Mm.Menu(conexion,cursor)
