import os
import sys
import time


def slowprint(s):
    for c in s + '\n' :
        sys.stdout.write(c)
        sys.stdout.flush()
        time.sleep(10. / 100)
slowprint("[!] Starting... ")
time.sleep(5)
# os.system('clear') for clear the terminal 
os.system('clear')
print('''\033[1;31m \033[97m
 ____  __.____       _____  ____  _____________.____    ________  .______________
|    |/ _|    |     /  _  \ \   \/  /\______   \    |   \_____  \ |   \__    ___/
|      < |    |    /  /_\  \ \     /  |     ___/    |    /   |   \|   | |    |
|    |  \|    |___/    |    \/     \  |    |   |    |___/    |    \   | |    |
|____|__ \_______ \____|__  /___/\  \ |____|   |_______ \_______  /___| |____|
        \/       \/       \/      \_/                  \/       \/            
                      Email Filtering
''')
def slowprint(s):
    for c in s + '\n' :
        sys.stdout.write(c)
        sys.stdout.flush()
        time.sleep(10. / 100)
#email-type-list : 
#you can add another type of email ^_^ !
yahoo = ('yahoo.com\n')
outlook = ('outlook.com\n')
web = ("web.com\n")
hotmail = ('hotmail.com\n')
wanadoo = ("wanadoo.com\n")
gmx = ("gmx.com\n")
aol = ("aol.com\n")
msn = ("msn.com\n")
live = ("live.com\n")
yandex = ("yandex.com\n")
bk = ("bk.ru\n")
inbox = ("inbox.ru\n")
mailru = ("mail.ru\n")
a = ('prodigy.net\n')
b = ('rogers.com\n')
c = ('cox.net\n')
d = ('centurytel.net\n')
f = ('juno.com\n')
g = ('comcast.net\n')
h = ('sympatico.ca\n')
l = ('earthlink.net\n')
k = ('bellsouth.net\n')
v = ('verizon.net\n')
q = ('sbcglobal.net\n')
# here script ask you to put your email list !
hani=input("\033[94m[+]\033[97m Your \033[91mMailist? \033[97m")
list = open(hani, "r")
passwords = list.readlines()
# with slowprint script is COOL :V
slowprint("\033[94m[!]\033[92m Filtering...\033[97m")
# here the real work :3 
#script will read the email-list and he will filtering the email (gmail,outlook,hotmail...)
#script will open new text and he will write all the email 
# ex : script will write all the gmail email in text file : gmail.txt
for lylia in passwords :          
          if lylia.endswith(yahoo) :
                    file = open("yahoo.txt","a")
                    file.write((lylia)+"")
                    file.close()    
          if lylia.endswith(outlook) :
                    file = open("outlook.txt","a")
                    file.write((lylia)+"")
                    file.close()       
          if lylia.endswith(hotmail) :
                    file = open("hotmail.txt","a")
                    file.write((lylia)+"")
                    file.close()       
          if lylia.endswith(web) :
                    file = open("web.txt","a")
                    file.write((lylia)+"")
                    file.close()  
          if lylia.endswith(aol) :
                    file = open("aol.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(msn) :
                    file = open("msn.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(a) :
                    file = open("other.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(b) :
                    file = open("other.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(c) :
                    file = open("other.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(d) :
                    file = open("other.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(f) :
                    file = open("other.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(g) :
                    file = open("other.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(h) :
                    file = open("other.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(l) :
                    file = open("other.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(k) :
                    file = open("other.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(v) :
                    file = open("other.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(live) : 
                    file = open("live.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(yandex) :
                    file = open("yandex.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(mailru) : 
                    file = open("mail.ru.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(bk) : 
                    file = open("mail.ru.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          if lylia.endswith(inbox) : 
                    file = open("mail.ru.txt","a")
                    file.write((lylia)+"")
                    file.close()
          if lylia.endswith(q) : 
                    file = open("sbcglobal.txt","a")
                    file.write((lylia)+"")
                    file.close() 
          

print("\033[92mDone\033[97m , nice\033[91m phishing\033[97m !")
# you can add new email type 
# yourname = ('your.email.type+\n')
#and add this 
#if lylia.endswith(yourname) :
#        file = open("youremailname.txt","a")
#        file.write((lylia)+"\n")
#        file.close()
# ENJOY ;)
