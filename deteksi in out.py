import numpy as np
import cv2
import Car
import pyautogui
import time
from datetime import datetime
import os
import mysql.connector
import smtplib
import ssl
from email.message import EmailMessage

# deklarasi cascade untuk motor
# cascade_src = "bike.xml"
# bike_cascade = cv2.CascadeClassifier(cascade_src)

# buka koneksi
mysql = mysql.connector.connect(user='root', 
                                password='', 
                                host='localhost', 
                                database='jalan_toll');

mysqlCursor = mysql.cursor();

# Define email sender and receiver
email_sender = 'surianty269@gmail.com'
email_password = 'smrkshocnlsqhsil'
email_receiver = 'ahmadzdy230401@gmail.com'

# Set the subject and body of the email
subject = 'Terjadi Pelanggaran di Jalan Toll !!'

body = """
Telah terjadi Pelanggaran Lalu Lintas!!!

MOHON SEGERA DI TINDAK
"""

em = EmailMessage()
em['From'] = email_sender
em['To'] = email_receiver
em['Subject'] = subject
em.set_content(body)

# Add SSL (layer of security)
context = ssl.create_default_context()


# Input and output counters
cnt_up   = 0
cnt_down = 0
pelanggaran = 0
motor = 0

#Video source
#cap = cv2.VideoCapture(0)
cap = cv2.VideoCapture('rtsp://admin:dcttotal2019@36.67.188.241:558/LiveChannel/4/media.smp')
cap.set(cv2.CAP_PROP_BUFFERSIZE, 10)

#Properties of the video
##cap.set(3,160) #Width
##cap.set(4,120) #Height

#Print the capture properties to console
# for i in range(19):
#     print (i, cap.get(i))

w = cap.get(3)
h = cap.get(4)
frameArea = h*w
areaTH = frameArea/750
print ('Area Threshold', areaTH)

#In / out lines
line_up = int(4.5*(h/7))
line_down   = int(5*(h/7))

up_limit =   int(4*(h/7))
down_limit = int(5.5*(h/7))

print ("Red line y:",str(line_down))
print ("Blue line y:", str(line_up))
line_down_color = (255,0,0)
line_up_color = (210, 232, 16)

pt1 =  [0, line_down];
pt2 =  [w, line_down];
pts_L1 = np.array([pt1,pt2], np.int32)
pts_L1 = pts_L1.reshape((-1,1,2))

pt3 =  [0, line_up];
pt4 =  [w, line_up];
pts_L2 = np.array([pt3,pt4], np.int32)
pts_L2 = pts_L2.reshape((-1,1,2))

pt5 =  [0, up_limit];
pt6 =  [w, up_limit];
pts_L3 = np.array([pt5,pt6], np.int32)
pts_L3 = pts_L3.reshape((-1,1,2))

pt7 =  [0, down_limit];
pt8 =  [w, down_limit];
pts_L4 = np.array([pt7,pt8], np.int32)
pts_L4 = pts_L4.reshape((-1,1,2))

#Background Substractor
fgbg = cv2.createBackgroundSubtractorMOG2(detectShadows = True)

# Structuring elements for morphographic filters
kernelOp = np.ones((3,3),np.uint8)
kernelOp2 = np.ones((5,5),np.uint8)
kernelCl = np.ones((11,11),np.uint8)

#Variables
font = cv2.FONT_HERSHEY_SIMPLEX
cars = []
bike = []
max_p_age = 5
pid = 1
frame_countdown = 0

def overlap(self, start_point, end_point):
        if self.start_point[0] >= end_point[0] or self.end_point[0] <= start_point[0] or \
                self.start_point[1] >= end_point[1] or self.end_point[1] <= start_point[1]:
            return False
        else:
            return True

while(cap.isOpened()):
##for image in camera.capture_continuous(rawCapture, format="bgr", use_video_port=True):
    #Read an image of the video source
    ret, frame = cap.read()
    ##frame = image.array

    if not os.path.exists('pelanggaran'):
        os.makedirs('pelanggaran')

    for i in cars:
        i.age_one() #age every object one frame

    # for j in bike:
    #     j.age_one() #age every object one frame
    
    #Application background subtraction
    fgmask = fgbg.apply(frame)
    fgmask2 = fgbg.apply(frame)

    #Binariazcion to eliminate shadows (gray color)
    try:
        #for motorcycle
        # gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
        # bike = bike_cascade.detectMultiScale(gray,1.01, 1)
        #blur=cv2.GaussianBlur(gray,(3,3),5)

        #for cars
        ret,imBin= cv2.threshold(fgmask,200,255,cv2.THRESH_BINARY)
        ret,imBin2 = cv2.threshold(fgmask2,200,255,cv2.THRESH_BINARY)
        #Opening (erode->dilate) 
        mask = cv2.morphologyEx(imBin, cv2.MORPH_OPEN, kernelOp)
        mask2 = cv2.morphologyEx(imBin2, cv2.MORPH_OPEN, kernelOp)
        # #Closing (dilate -> erode) 
        mask =  cv2.morphologyEx(mask , cv2.MORPH_CLOSE, kernelCl)
        mask2 = cv2.morphologyEx(mask2, cv2.MORPH_CLOSE, kernelCl)
    except:
         time.sleep(10)
    #     print('EOF')
    #     print ('UP:',cnt_up)
    #     print ('DOWN:',cnt_down)
    #     break
    # RETR_EXTERNAL returns only extreme outer flags. All child contours are left behind.
    contours0, hierarchy = cv2.findContours(mask2,cv2.RETR_EXTERNAL,cv2.CHAIN_APPROX_SIMPLE)
    for cnt in contours0:
        area = cv2.contourArea(cnt)
        if area > areaTH:
            #################
            #   TRACKING    #
            #################
            
            M = cv2.moments(cnt)
            cx = int(M['m10']/M['m00'])
            cy = int(M['m01']/M['m00'])
            x,y,w,h = cv2.boundingRect(cnt)

            new = True
            if cy in range(up_limit,down_limit):
                for i in cars:
                    if abs(cx-i.getX()) <= w and abs(cy-i.getY()) <= h:
                        # the object is close to one that was already detected before
                        new = False
                        i.updateCoords(cx,cy)   #Update coordinates on the object and resets age

                        # if i.going_UP(line_down,line_up) == True:
                        #     cnt_up += 1;
                        #     waktu = time.strftime("%c")
                        #     print ("ID:",i.getId(),'crossed going up at',waktu)

                            # untuk screenshoot
                            # image = pyautogui.screenshot()
                            # image = cv2.cvtColor(np.array(image), cv2.COLOR_RGB2BGR)
                            # cv2.imwrite("patuh\patuh" + str(cnt_up) + ".png", image)

                        # Jika kendaraan melawan arah (dari arah depan ke belakang)
                        if i.going_DOWN(line_down,line_up) == True:
                            cnt_down += 1;
                            pelanggaran += 1;
                            curr_datetime = datetime.now().strftime('%Y-%m-%d %H-%M-%S')
                            waktu = time.strftime("%c")
                            idkendaraan = i.getId()
                            print ("ID:",i.getId(),'MELAKUKAN PELANGGARAN',waktu)

                            cv2.circle(frame,(cx,cy), 5, (0,255,0), -1)
                            img = cv2.rectangle(frame,(x,y),(x+w,y+h),(0,0,255),2) 

                            # untuk screenshoot
                            image = pyautogui.screenshot()
                            image = cv2.cvtColor(np.array(image), cv2.COLOR_RGB2BGR)
                            cv2.imwrite("pelanggaran\melawanarus - " + str(cnt_down) + "-" + str(curr_datetime) +".png", image)

                            # membuat query untuk insert data ke mysql
                            sql = "INSERT INTO data_pelanggaran(ID_KENDARAAN, JENIS_PELANGGARAN, WAKTU) VALUES ('"+str(idkendaraan)+"', 'Melawan Arus', now())";

                            # untuk memasukkan variabel int kedalam sql, maka tidak diperlukan petik satu. hanya untuk data string yang memerlukan double petik
                            print(sql)

                            mysqlCursor.execute(sql)

                            # mengeksekusi commit biar permanen
                            mysql.commit()

                            # Log in and send the email
                            with smtplib.SMTP_SSL('smtp.gmail.com', 465, context=context) as smtp:
                                smtp.login(email_sender, email_password)
                                smtp.sendmail(email_sender, email_receiver, em.as_string())
                        break

                    if i.getState() == '1':
                        if i.getDir() == 'down' and i.getY() > down_limit:
                            i.setDone()
                        elif i.getDir() == 'up' and i.getY() < up_limit:
                            i.setDone()

                    if i.timedOut():
                        index = cars.index(i)
                        cars.pop(index)
                        del i    
                         
                if new == True:
                    p = Car.MyCar(pid,cx,cy, max_p_age)
                    cars.append(p)
                    pid += 1

                # for (w,y,w,h) in bike:
                    
                #     cv2.rectangle(frame,(x,y),(x+w,y+h),(0,255,215),2)
                #     motor += 1;
                #     pelanggaran += 1;

                #     # if overlap((x, y), (x + w, y + h)):
                #     #     if frame_countdown <= 0:
                #     #         motor += 1;
                #     #         pelanggaran += 1;
                #     #     # The number might be adjusted, it is just set based on my settings
                #     #     frame_countdown = 20

                #     # untuk screenshoot
                #     curr_datetime = datetime.now().strftime('%Y-%m-%d %H-%M-%S')
                #     image = pyautogui.screenshot()
                #     image = cv2.cvtColor(np.array(image), cv2.COLOR_RGB2BGR)
                #     cv2.imwrite("pelanggaran\motor - " + str(cnt_down) + "-" + str(curr_datetime) +".png", image)
                #     print ("TERDETEKSI KENDARAAN BERMOTOR MEMASUKI AREA TOL")

                #     # if i.getState() == '1':
                #     #     if i.getDir() == 'down' and i.getY() > down_limit:
                #     #         i.setDone()
                #     #     elif i.getDir() == 'up' and i.getY() < up_limit:
                #     #         i.setDone()

                #     # if i.timedOut():
                #     #     index = bike.index(i)
                #     #     bike.pop(index)
                #     #     del i

            # cv2.circle(frame,(cx,cy), 5, (0,0,255), -1)
            # img = cv2.rectangle(frame,(x,y),(x+w,y+h),(0,255,0),2)            
            #cv2.drawContours(frame, cnt, -1, (0,255,0), 3)
    #END for cnt in contours0
    for i in cars:
##        if len(i.getTracks()) >= 2:
##            pts = np.array(i.getTracks(), np.int32)
##            pts = pts.reshape((-1,1,2))
##            frame = cv2.polylines(frame,[pts],False,i.getRGB())
##        if i.getId() == 9:
##            print str(i.getX()), ',', str(i.getY())
        cv2.putText(frame, str(i.getId()),(i.getX(),i.getY()),font,1.5,i.getRGB(),2,cv2.LINE_AA)
    
    # for (x,y,h,w) in bike:
    #     cv2.putText(frame, str(motor),(x,y),font,1,(0,0,255),2)
        
    #################
    #   IMAGES      #
    #################
    #str_up = 'UP: '+ str(cnt_up)
    str_pelanggaran = 'JUMLAH PELANGGARAN : ' + str(pelanggaran)
    str_down = 'MELAWAN ARAH: '+ str(cnt_down)
    # str_motor = 'MOTOR : ' + str(motor)
    frame = cv2.polylines(frame,[pts_L1],False,line_down_color,thickness=2)
    frame = cv2.polylines(frame,[pts_L2],False,line_up_color,thickness=2)
    frame = cv2.polylines(frame,[pts_L3],False,(255,255,255),thickness=1)
    frame = cv2.polylines(frame,[pts_L4],False,(255,255,255),thickness=1)
    cv2.putText(frame, str_pelanggaran ,(10,40),font,0.5,(255,255,255),2,cv2.LINE_AA)
    cv2.putText(frame, str_pelanggaran ,(10,40),font,0.5,(0,0,255),1,cv2.LINE_AA)
    cv2.putText(frame, str_down ,(10,90),font,0.5,(255,255,255),2,cv2.LINE_AA)
    cv2.putText(frame, str_down ,(10,90),font,0.5,(255,0,0),1,cv2.LINE_AA)
    # cv2.putText(frame, str_motor ,(10,140),font,0.5,(255,255,255),2,cv2.LINE_AA)
    # cv2.putText(frame, str_motor ,(10,140),font,0.5,(255,0,0),1,cv2.LINE_AA)

    cv2.imshow('Frame',frame)
    #cv2.imshow('Mask',mask)    
    #press ESC to exit
    k = cv2.waitKey(1)
    if k == 27:
        break
#END while(cap.isOpened())
cap.release()
cv2.destroyAllWindows()
#print ('UP:',cnt_up)
print ('PELANGGARAN:',pelanggaran)
print ('MELAWAN ARUS:',cnt_down)
# print ('KENDARAAN BERMOTOR:',motor)

#IP 192.168.1.128
#password admin123