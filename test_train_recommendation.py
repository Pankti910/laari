import json
import numpy
import json
import nltk
import pickle
from nltk.tokenize import word_tokenize 
from nltk.corpus import stopwords
from matplotlib import pyplot as plt
import random

common_ts=["The","These","Their","Thought","Though","This","That"]

########################################################################################
#Activations
def sigmoid(x):
    return 1/(1+numpy.exp(-x))

def sigmoid_d(x):
    return sigmoid(x)*(1-sigmoid(x))
#Activations
with open("/xampp/htdocs/laari/login_log/online.json","r") as read_f:
    names=json.load(read_f)

i=random.randint(0,(len(names)-1))
name=names[i]   


with open("/xampp/htdocs/laari/user_corpuses/"+name+".json","r") as read_f:
    user_data=json.load(read_f)
        #user_searched Corpus

with open("/xampp/htdocs/laari/laari_wala/Test_corpus.json","r") as read_f:
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
print(tk)
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
print(tk1)
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

#training the data points
with open("/xampp/htdocs/laari/laari_wala/token_data_x.json","r") as rx_file:
    data_x=json.load(rx_file)

with open("/xampp/htdocs/laari/laari_wala/token_data_y.json","r") as ry_file:
    data_y=json.load(ry_file)

infile=open("/xampp/htdocs/laari/weight_bias","rb")
w=pickle.load(infile)
infile.close()

##################################################################################
#train modules
def train(in_pos,tar_pos):
    #plt.scatter(data_x,data_y)
    print(data_x[i_pos])
    print(data_y[i_pos])

    inp=numpy.array([[data_x[in_pos],data_y[in_pos]]])
    target=numpy.array([[data_x[tar_pos],data_y[tar_pos]]])

    ##############################################################################
    #training part
    for i in range(3000):
    #feed-forward
        sample=inp.dot(w[0])+0.1
        final=sample.dot(w[1])+0.1
        pred=sigmoid(final)
    #feed-forward

        cost=(pred-target)**2    
        
    #back-prop
        dcost_dpred=2*(pred-target)
        dpred_dz=sigmoid_d(final)
        dz_dw1=data_x[in_pos]
        dz_dw2=data_y[in_pos]
        dz_db=1

        dcost_dw1=dcost_dpred*dpred_dz*dz_dw1
        dcost_dw2=dcost_dpred*dpred_dz*dz_dw2
        dcost_db=dcost_dpred*dpred_dz*dz_db
    #back-prop
    #print(w2)
        w[0]=w[0]-0.01*dcost_dw1.T
        w[1]=w[1]-0.01*dcost_dw2
        w[2]=w[2]-0.01*dcost_db
    #training part
    data_x[i_pos]=pred[0][0]
    data_y[i_pos]=pred[0][1]
    print(data_x[i_pos])
    print(data_y[i_pos])
    ##############################################################################                
    #plt.scatter(data_x,data_y)
    with open("/xampp/htdocs/laari/laari_wala/token_data_x.json","w") as wx_file:
        json.dump(data_x,wx_file)

    with open("/xampp/htdocs/laari/laari_wala/token_data_y.json","w") as wy_file:
        json.dump(data_y,wy_file)
    
#train modules
###################################################################################


i=0
if(len(pos)>1):
    while(i!=len(pos)):
    #for the first word (2 tokens with next)
        if(i==0):
            i_pos=pos[i]
            t_pos=pos[i+1]
            train(i_pos,t_pos)
    #for the first word 
    
    #for the last word (2 tokens with prev)
        elif(i==len(pos)-1):
            i_pos=pos[i]
            t_pos=pos[i-1]
            train(i_pos,t_pos)
    #for the last word (2 tokens with prev)
    
    #for the middle words(3 words)
        else:
            i_pos=pos[i]
            t_pos=pos[i+1]
            train(i_pos,t_pos)
            t_pos=pos[i-1]
            train(i_pos,t_pos)
    #for the middle words(3 words)
        i=i+1
#training the data points