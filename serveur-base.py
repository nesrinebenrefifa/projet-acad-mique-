import socket
import time
import pymysql
serversocket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
serversocket.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
host = '192.168.43.248'
port = 43212
HEADERSIZE = 1024
serversocket.bind((host, port))
serversocket.listen(5)
connection = pymysql.connect(host="localhost",user="root",passwd="",database="iot" )
cursor = connection.cursor()
while True:
   clientsocket, addr = serversocket.accept()
   while True:
    msg = clientsocket.recv(HEADERSIZE)
    msg=msg.decode('ascii')
    pieces =msg.split("-")
    if len(pieces)>3 :cursor.execute("""INSERT INTO PIECES (PIECE1,PIECE2,PIECE3) VALUES(%s,%s,%s)""",(pieces[1],pieces[2],pieces[3]))
    connection.commit()