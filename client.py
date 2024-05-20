import time
import os
import socket
clientsocket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
host = '192.168.43.248'
port = 43212
HEADERSIZE=10240
clientsocket.connect((host,port))
while True:
    
   msg="-"+"11"+"-"+"22.988"+"-"+"33"+"-"
   
   clientsocket.sendall(msg.encode())
   
   time.sleep(5)