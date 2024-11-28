import requests

respuesta= requests.get("https://www.google.com")
print("El código de respuesta es:",respuesta.status_code)