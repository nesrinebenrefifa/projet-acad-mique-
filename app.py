import firebase_admin
from flask import Flask, render_template, request
from firebase_admin import credentials, db
import time
from flask_mail import Mail, Message

# Initialiser l'application Flask
app = Flask(__name__)

# Charger les credentials de Firebase
cred = credentials.Certificate("dht11-979e2-firebase-adminsdk-7qx4q-f886472af5.json")
firebase_admin.initialize_app(cred, {'databaseURL': 'https://dht11-979e2-default-rtdb.firebaseio.com'})

# Route pour afficher les données
@app.route('/')
def afficher_donnees():
    ref = db.reference('/capteur/dht')
    temp_hum_data = ref.get()
    return render_template('index.html', temp_hum_data=temp_hum_data)

@app.route('/soil')
def afficher_soil_data():
    ref = db.reference('/capteur/soil')
    soil_data = ref.get()
    return render_template('soil.html', soil_data=soil_data)
# Configuration de Flask-Mail
app.config['MAIL_SERVER'] = 'smtp.gmail.com'
app.config['MAIL_PORT'] = 587
app.config['MAIL_USE_TLS'] = True
app.config['MAIL_USERNAME'] = 'nes452131@gmail.com'
app.config['MAIL_PASSWORD'] = '12345NES'
app.config['MAIL_DEFAULT_SENDER'] = ('nesrine', 'benrefifanesrine@gmail.com')

# Initialisation de l'extension Flask-Mail
mail = Mail(app)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/send_email', methods=['POST'])
def send_email():
    if request.method == 'POST':
        recipient = request.form['recipient']
        subject = request.form['subject']
        body = request.form['body']

        # Envoi de l'e-mail
        msg = Message(subject, recipients=[recipient])
        msg.body = body
        mail.send(msg)

        return 'E-mail sent successfully!'
    else:
        return 'Method not allowed'

if __name__ == '__main__':
    app.run(debug=True)
