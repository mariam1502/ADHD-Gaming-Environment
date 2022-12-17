import socket  #local communication (bits)
import time 
import numpy as np # linear algebra

import cv2
import cvzone
from cvzone.FaceMeshModule import FaceMeshDetector
from cvzone.PlotModule import LivePlot
from threading import Thread


host, port = "127.0.0.1", 25001
sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
sock.connect( (host, port) )
x=0


class BlinkClass:   ##class used for eye blinking detection using image processing 
    blinkCounter =0

    def getBlinkCounter(self):
        return self.blinkCounter
    def setBlinkCounter(self,blinks):
        self.blinkCounter=blinks

    def timer(self,blinks):
        while True: #12 and 15/min.12 and 15/min.
            time.sleep(60)
            # print()
            if self.getBlinkCounter()>=12 and self.getBlinkCounter()<= 15:
                cc.setAttentionLevel("normal attention")   ################# DATA I WANT TO SEND ############
                print(str(self.getBlinkCounter())+'  normal attention')
            elif self.getBlinkCounter() <12:
                cc.setAttentionLevel("high attention")
                print(str(self.getBlinkCounter())+'    high attention')
            elif self.getBlinkCounter() >15:
                cc.setAttentionLevel("low attention")
                print(str(self.getBlinkCounter())+'  low attention')
            self.setBlinkCounter(0)

    def BlinkDetection(self):
        cap=cv2.VideoCapture(0)
        detector=FaceMeshDetector(maxFaces=1)
        plotY=LivePlot(640,360,[20,50],interval=True)

        # blinkCounte=0
        idList=[22,23,24,26,110,157,158,159,160,161,130,243]
        ratioList=[]
        counter=0
        color=(255,0,255)
        while True:

 
            #

            if cap.get(cv2.CAP_PROP_POS_FRAMES)==cap.get(cv2.CAP_PROP_FRAME_COUNT):
                cap.set(cv2.CAP_PROP_POS_FRAMES,0)

            success,img=cap.read()
            img,faces=detector.findFaceMesh(img,draw=False)
            if faces:
                face=faces[0]
                for id in idList:
                    cv2.circle(img,face[id],2,color,cv2.FILLED)

                leftUp=face[159]
                leftDown=face[23]
                leftLeft=face[130]
                leftRight=face[243]

                lengthVer,_=detector.findDistance(leftUp,leftDown)
                lengthHor,_=detector.findDistance(leftLeft,leftRight)

                cv2.line(img,leftUp,leftDown,color,2)
                cv2.line(img,leftLeft,leftRight,color,2)

                ratio=int((lengthVer/lengthHor)*100)
                ratioList.append(ratio)
                if len(ratioList)>2:
                    ratioList.pop(0)
                ratioAvg=sum(ratioList)/len(ratioList)
                if ratioAvg<35 and counter==0:
                    self.blinkCounter+=1
                    # self.blinkCounter=self.blinkCounter

                    color=(0,200,0)
                    counter=1
                if counter!=0:
                    counter+=1
                    if counter >10:
                        counter=0
                        color=(255,0,255)
                cvzone.putTextRect(img,f'Blink Count: {self.blinkCounter}',(50,100),colorR=color)
                impPlot=plotY.update(ratioAvg,color)
                img = cv2.resize(img, (640, 360))
                imgStack=cvzone.stackImages([img,impPlot],2,1)
            else:
                img = cv2.resize(img, (640, 360))
                imgStack = cvzone.stackImages([img, img], 2, 1)

            cv2.imshow('Image',imgStack)
            cv2.waitKey(25)

class connectionClass:  ## live connection between unity and python using socket connection
    attentionLevel=""

    def getAttentionLevel(self):
        return self.attentionLevel
    def setAttentionLevel(self,level):
        self.attentionLevel=level
    def resetAttention(self):
        self.attentionLevel=""

    def con(self):
        while True:
            time.sleep(0.5) #sleep 0.5 sec
            sock.sendall(str(1).encode("UTF-8")) #Converting string to Byte, and sending it to C#

            sock.sendall(str(self.getAttentionLevel()).encode("UTF-8")) #Converting string to Byte, and sending it to C#
            self.resetAttention()

            print(x)


            # sock.sendall(str("hello unity").encode("UTF-8")) #Converting string to Byte, and sending it to C#


            receivedData = sock.recv(1024).decode("UTF-8") #receiveing data in Byte fron C#, and converting it to String
            print(receivedData)


c=BlinkClass()
cc=connectionClass()

t2=Thread(target=c.BlinkDetection)
t2.start()

t1 = Thread(target=c.timer, args=[c.blinkCounter])
t1.start()

t3=Thread(target=cc.con)
t3.start()





# while True:
    # time.sleep(0.5) #sleep 0.5 sec


    # sock.sendall(str(x).encode("UTF-8")) #Converting string to Byte, and sending it to C#

    # print(x)

    
    # # sock.sendall(str("hello unity").encode("UTF-8")) #Converting string to Byte, and sending it to C#

   
    # receivedData = sock.recv(1024).decode("UTF-8") #receiveing data in Byte fron C#, and converting it to String
    # print(receivedData)
