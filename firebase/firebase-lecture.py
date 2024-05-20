import firebase_admin
# import RPi.GPIO as GPIO
import time
import math
from firebase_admin import credentials,auth,db
import mysql.connector
DO = 17
# GPIO.setmode(GPIO.BCM)
cred = credentials.Certificate("dht11-979e2-firebase-adminsdk-7qx4q-f886472af5.json")
# Initialize the app with a service account, granting admin privileges
firebase_admin.initialize_app(cred, {'databaseURL': 'https://dht11-979e2-default-rtdb.firebaseio.com'})

ref = db.reference('/')
CAPTEUR= ref.get()

while True:
  
  CAPTEUR=ref.get()
  
  print(CAPTEUR)
  time.sleep(5000)
  # Connexion à la base de données MySQL
  conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="firebase"
)

# Vérifier la connexion
  if conn.is_connected():
    print('Connecté à la base de données MySQL')

# Créer un curseur pour exécuter des requêtes SQL
  cursor = conn.cursor()

# Parcourir les données récupérées de Firebase et les insérer dans la base de données MySQL



# Exemple d'insertion de données dans une table MySQL
  sql = "INSERT INTO valeurs (température, humidité,gaz) VALUES (%s, %s,%s)"
  val = (CAPTEUR['CAPTEUR']['DHT11']['TEMP'], CAPTEUR['CAPTEUR']['DHT11']['hum'], CAPTEUR['CAPTEUR']['gaz']['val'])
  

  cursor.execute(sql,val)

# Assurez-vous de valider les changements et de fermer la connexion
  conn.commit()
  conn.close()

  
 