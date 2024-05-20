import firebase_admin
from firebase_admin import credentials,auth,db

cred = credentials.Certificate("")
# Initialize the app with a service account, granting admin privileges
firebase_admin.initialize_app(cred, {'databaseURL': ''})


ref = db.reference('/')
ref.set({
"CAPTEUR":{
  'DHT11':{"TEMP":"24", "hum":"60%"},
  'gaz':{"val":"0"}
   
}
})