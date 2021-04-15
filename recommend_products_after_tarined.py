#closest points
import json
import numpy
import json
import nltk
import pickle
import math
from nltk.tokenize import word_tokenize 
from nltk.corpus import stopwords
from matplotlib import pyplot as plt
import sys
import random


common_ts=["The","These","Their","Thought","Though","This","That"]

with open("/xampp/htdocs/laari/login_log/online.json","r") as read_f:
    names=json.load(read_f)

i=random.randint(0,(len(names)-1))
name=names[i]  


with open("/xampp/htdocs/laari/user_corpuses/Pankti2.json","r") as read_f:
    user_data=json.load(read_f)
    #user_searched Corpus

with open("/xampp/htdocs/laari/laari_wala/token_string.json","r") as read_f:
    corpus_data=json.load(read_f)
    #database and keywords corpus


##########################################################################################
#non-tokenized Array
words=[]
words=user_data['Array']
#non-tokenized Array

#flags for tokenizing
i=0
j=0
l=0
k=0
#flags

tk=[]
#input as [words]
#tokenizing
while i<(len(words)):
    #print(data[i])
    sample_tk=word_tokenize(words[i])
    for word in sample_tk:
        if word not in stopwords.words():
            tk.append(word)     
    i=i+1
#tokenizing
#final output [tk]


#removing common_ts
while j != (len(tk)):
    for w_t in common_ts:
        if tk[j]==w_t:
            tk.remove(tk[j])
    j=j+1
#removing common

#cleaning corpus
while l != (len(tk)):
    k=l+1
    while k!=(len(tk)):
        if tk[l] == tk[k]:
            del tk[k]
            break
        k=k+1
    l=l+1
#cleaning corpus
#TOKENIZED USER_DATA


################################################################################################

#TOKENIZING CORPUS_DATA
#non-tokenized Array
words2=[]
words2=corpus_data
#non-tokenized Array

#flags for tokenizing
i=0
j=0
l=0
k=0
#flags

tk1=[]
#input as [words]
#tokenizing
while i<(len(words2)):
    #print(data[i])
    sample_tk1=word_tokenize(words2[i])
    for word1 in sample_tk1:
        if word1 not in stopwords.words():
            tk1.append(word1)     
    i=i+1
#tokenizing
#final output [tk]


#removing common_ts
while j != (len(tk)):
    for w_t in common_ts:
        if tk1[j]==w_t:
            tk1.remove(tk[j])
    j=j+1
#removing common


#cleaning corpus
while l != (len(tk1)):
    k=l+1
    while k!=(len(tk1)):
        if tk1[l] == tk1[k]:
            del tk1[k]
            break
        k=k+1
    l=l+1
#cleaning corpus
#TOKENIZED CORPUS_DATA

################################################################################################

#data x,y positions
i=0
userxy=[]
while(i!=len(tk)):
    j=0
    while(j!=len(tk1)):
        if(tk[i]==tk1[j]):
            userxy.append(j)
        j=j+1
    i=i+1
#data x,y positions


################################################################################################
with open("/xampp/htdocs/laari/laari_wala/token_data_x.json","r") as rx_file:
    arrx=json.load(rx_file)

with open("/xampp/htdocs/laari/laari_wala/token_data_y.json","r") as ry_file:
    arry=json.load(ry_file)

print(len(corpus_data))
print(len(arrx))

#plt.scatter(arrx,arry)

a1=numpy.array([[0.3]])
a2=numpy.array([[0.5]])
b1=numpy.array([[0.8]])
b2=numpy.array([[0.7]])
c1=numpy.array([[0.5]])
c2=numpy.array([[0.2]])

#plt.scatter(a1,a2,color="green")#green
#plt.scatter(b1,b2,color="orange")#orange
#plt.scatter(c1,c2,color="black")#black
#plt.show()

black_x=[]
black_y=[]
green_x=[]
green_y=[]
orange_x=[]
orange_y=[]

for i in range(len(arrx)):
    #dist_green=((a1-arrx[i])**2)-((a2-arry[i])**2)
    #dist_orange=((b1-arrx[i])**2)-((b2-arry[i])**2)
    #dist_black=((c1-arrx[i])**2)-((c2-arry[i])**2)
    green=numpy.array((a1,a2))
    orange=numpy.array((b1,b2))
    black=numpy.array((c1,c2))
    x_y=numpy.array((arrx[i],arry[i]))

    d_g=math.sqrt(sum([(a-b)**2 for a,b in zip(green,x_y)]))
    d_o=math.sqrt(sum([(a-b)**2 for a,b in zip(orange,x_y)]))
    d_b=math.sqrt(sum([(a-b)**2 for a,b in zip(black,x_y)]))
    #print(d_g,d_o,d_b)
    
    if d_g<d_o:
        if d_g<d_b:
            green_x.append(arrx[i])
            green_y.append(arry[i])
        else:
            black_x.append(arrx[i])
            black_y.append(arry[i])
    else:
        if d_o<d_b:
            orange_x.append(arrx[i])
            orange_y.append(arry[i])
        else:
            black_x.append(arrx[i])
            black_y.append(arry[i])
            
#plt.scatter(green_x,green_y,color="green")
#plt.scatter(orange_x,orange_y,color="orange")
#plt.scatter(black_x,black_y,color="black")

#plt.scatter(a1,a2,color="green")
#plt.scatter(b1,b2,color="orange")
#plt.scatter(c1,c2,color="black")

#plt.show()

def cmp_cluster(x,y,cx,cy):
    cntx=0
    cnty=0
    result=[]
    for i in range(len(cx)):
        for j in range(len(x)):
            if x[j] == cx[i]:
                cntx +=1

    for i in range(len(cy)):
        for j in range(len(y)):
            if y[j] == cy[i]:
                cnty +=1

    result.append(cntx)
    result.append(cnty)
    return result

resg= cmp_cluster(arrx,arry,green_x,green_y)
reso= cmp_cluster(arrx,arry,orange_x,orange_y)
resb= cmp_cluster(arrx,arry,black_x,black_y)


cluster_flag=0
pos=[]
if resg > reso:
    if resg > resb:
        cluster_flag=1
        #for i in range(len(corpus_data)):
        #    for j in range(len(green_x)):
        #        if green_x[j] == arrx[i]:
        #            pos.append(corpus_data[i])

       # with open("/xampp/htdocs/laari/user_corpuses/"+name+"_recommend.json","w") as w_file:
       #     json.dump(pos,w_file)
    else:
        cluster_flag=3
        #for i in range(len(corpus_data)):
        #    for j in range(len(black_x)):
        #        if black_x[j] == arrx[i]:
        #            pos.append(corpus_data[i])


       # with open("/xampp/htdocs/laari/user_corpuses/"+name+"_recommend.json","w") as w_file:
       #     json.dump(pos,w_file)
else:
    if d_o>d_b:
        cluster_flag=2
        #for i in range(len(corpus_data)):
        #    for j in range(len(orange_x)):
        #        if orange_x[j] == arrx[i]:
        #            pos.append(corpus_data[i])

        #with open("/xampp/htdocs/laari/user_corpuses/"+name+"_recommend.json","w") as w_file:
        #    json.dump(pos,w_file)
    else:
        cluster_flag=3
        #for i in range(len(corpus_data)):
        #    for j in range(len(black_x)):
        #        if black_x[j] == arrx[i]:
        #            pos.append(corpus_data[i])

        #with open("/xampp/htdocs/laari/user_corpuses/"+name+"_recommend.json","w") as w_file:
        #    json.dump(pos,w_file)

i=0
total_x=0
total_y=0
while(i!=len(userxy)):
    total_x=total_x + arrx[userxy[i]]
    total_y=total_y + arry[userxy[i]]
    i=i+1

x=(total_x/len(userxy))
y=(total_y/len(userxy))

print(x)
print(y)


rec_arr_x=[]

rec_data_x=[]
min_x=1
g=numpy.array((green_x,green_y))
o=numpy.array((orange_x,orange_y))
b=numpy.array((black_x,black_y))


if cluster_flag==1:
    k=0
    while(k!=3):
        j=0
        while(j!=len(green_x)):
            diff=math.sqrt((x-green_x[j])**2+(y-green_y[j])**2)
            l=0
            flag=0
            while(l!=len(rec_arr_x)):
                if(diff==rec_arr_x[l]):
                    flag=1
                l=l+1
            if(flag==0):
                if(min_x>diff):
                    min_x=diff
                    pos_x=corpus_data[j]
            j=j+1
        rec_arr_x.append(min_x)
        rec_data_x.append(pos_x)
        min_x=10
        k=k+1

if cluster_flag==2:
    k=0
    while(k!=3):
        j=0
        while(j!=len(orange_x)):
            diff=math.sqrt((x-orange_x[j])**2+(y-orange_y[j])**2)
            l=0
            flag=0
            while(l!=len(rec_arr_x)):
                if(diff==rec_arr_x[l]):
                    flag=1
                l=l+1
            if(flag==0):
                if(min_x>diff):
                    min_x=diff
                    pos_x=corpus[j]
            j=j+1
        rec_arr_x.append(min_x)
        rec_data_x.append(pos_x)
        min_x=10
        k=k+1
if cluster_flag==3:
    k=0
    while(k!=3):
        j=0
        while(j!=len(black_x)):
            diff=math.sqrt((x-black_x[j])**2+(y-black_y[j])**2)
            l=0
            flag=0
            while(l!=len(rec_arr_x)):
                if(diff==rec_arr_x[l]):
                    flag=1
                l=l+1
            if(flag==0):
                if(min_x>diff):
                    min_x=diff
                    pos_x=corpus_data[j]
            j=j+1
        rec_arr_x.append(min_x)
        rec_data_x.append(pos_x)
        min_x=10
        k=k+1

print(rec_data_x)

with open("/xampp/htdocs/laari/user_corpuses/"+name+"_recommend.json","w") as w_file:
    json.dump(rec_data_x,w_file)