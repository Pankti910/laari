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
import random

common_ts=["The","These","Their","Thought","Though","This","That"]

#f=open("name.txt","r")
#name=f.read()


with open("/xampp/htdocs/laari/login_log/online.json","r") as read_f:
    names=json.load(read_f)

i=random.randint(0,(len(names)-1))
name=names[i]  


with open("/xampp/htdocs/laari/user_corpuses/"+name+".json","r") as read_f:
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

cf=0
#checking no of tokens to make it learn
if(len(tk)>1):
    cf=1
else:
    cf=0
#checking no of tokens to make it learn

####################################################################################

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
pos=[]
while(i!=len(tk)):
    j=0
    while(j!=len(tk1)):
        if(tk[i]==tk1[j]):
            pos.append(j)
        j=j+1
    i=i+1
#data x,y positions

###########################################################################
#AVERAGE X AND Y
with open("/xampp/htdocs/laari/laari_wala/token_data_x.json","r") as rx_file:
    data_x=json.load(rx_file)

with open("/xampp/htdocs/laari/laari_wala/token_data_y.json","r") as ry_file:
    data_y=json.load(ry_file)

i=0
total_x=0
total_y=0
while(i!=len(pos)):
    total_x=total_x + data_x[pos[i]]
    total_y=total_y + data_y[pos[i]]
    i=i+1

x=(total_x/len(pos))
y=(total_y/len(pos))
######################################################################################
i=0
k=0
rec_arr_x=[]

rec_data_x=[]

#diff=math.sqrt((x-data_x[0])**2+(y-data_y[0])**2)
min_x=10

pos_x=0  #our carrier element which will deliver the ecommen



while(k!=3):
    j=0
    while(j<len(data_x)):
        print(j)
        diff=math.sqrt((x-data_x[j])**2+(y-data_y[j])**2)
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

with open("/xampp/htdocs/laari/user_corpuses/"+name+"_recommend.json","w") as w_file:
    json.dump(rec_data_x,w_file)