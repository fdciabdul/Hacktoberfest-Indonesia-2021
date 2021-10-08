import cv2
import numpy as np 

#Capture Video
cam = cv2.VideoCapture(0)

#set the height and width cam
cam.set(3, 550) #lebar
cam.set(4, 550) #tinggi

#Font what im use
font = cv2.FONT_HERSHEY_SIMPLEX

#=============================== API =================================
faceDetector = cv2.CascadeClassifier('API/face.xml') #API Face Recognition
eyesDetector = cv2.CascadeClassifier('API/eyes.xml') #API Eyes Recognition
#=====================================================================

while True:
    retV, frame = cam.read()
    abu = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    faces = faceDetector.detectMultiScale(abu, 1.3, 5) #frame, scaleFactor, minkel
    # eyes = eyesDetector.detectMultiScale(abu, 1.3, 5) #frame, scaleFactor, minkel

#Loop the recognition
    for (x, y, w, h) in faces:
            frame = cv2.rectangle(frame,(x,y), (x+w, y+h),(255,0,0),2)
            frame = cv2.putText(frame, 'Is Faces',(x,y), font, 2 ,(255,0,0),2, cv2.LINE_AA)
            roiAbu = abu[y:y+h, x:x+w]
            roiWarna = frame[y:y+h, x:x+w]
            eyes = eyesDetector.detectMultiScale(roiAbu)
            for (xe, ye, we, he) in eyes:
                cv2.rectangle(roiWarna, (xe, ye), (xe+we, ye+he), (0,0,255),1)
                frame = cv2.putText(frame, 'Is Eyes',(x, w), font, 2 ,(0,0,255),1, cv2.LINE_AA)

    cv2.imshow('Camera', frame)
    # cv2.imshow('webcamku', abu)
    
#key for closed the window/cam
    k = cv2.waitKey(1) & 0xFF
    if k == 27 or k == ord('q'):
        break 

cam.release()
cv2.destroyAllWindows()