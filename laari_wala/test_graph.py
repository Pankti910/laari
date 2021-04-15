#%%
#SHOWS TOKEN WITH ITS X AND Y VALUES    
import json
import numpy
import json
import nltk
from nltk.tokenize import word_tokenize 
from nltk.corpus import stopwords
from matplotlib import pyplot as plt

common_ts=["The","These","Their","Thought","Though","This","That"]

with open("/xampp/htdocs/laari/user_corpuses/Swapnil6.json","r") as read_f:
    user_data=json.load(read_f)
    #user_searched Corpus

with open("token_string.json","r") as read_f:
    corpus_data=json.load(read_f)
    #database and keywords corpus


#non-tokenized Array
#words=[]
#words=user_data['Array']
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
#while i<(len(words)):
    #print(data[i])
#    sample_tk=word_tokenize(words[i])
#    for word in sample_tk:
#        if word not in stopwords.words():
#            tk.append(word)     
#    i=i+1
#tokenizing
#final output [tk]


#removing common_ts
#while j != (len(tk)):
#    for w_t in common_ts:
#        if tk[j]==w_t:
#            tk.remove(tk[j])
#    j=j+1
#removing common

#cleaning corpus
#while l != (len(tk)):
#    k=l+1
#    while k!=(len(tk)):
#        if tk[l] == tk[k]:
#            del tk[k]
#            break
#        k=k+1
#    l=l+1
#cleaning corpus
#TOKENIZED USER_DATA

#cf=0
#checking no of tokens to make it learn
#if(len(tk)>1):
#    cf=1
#else:
#    cf=0
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
while j != (len(tk1)):
    for w_t in common_ts:
        if tk1[j]==w_t:
            tk1.remove(tk1[j])
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
#print(tk1)
#generating data points
#data_x=numpy.random.random((1,len(main_tk)))
#data_y=numpy.random.random((1,len(main_tk)))
#x_vals=list(data_x[0])
#y_vals=list(data_y[0])
#generating data points

with open("token_data_x.json","r") as rx_file:
    data_x=json.load(rx_file)

with open("token_data_y.json","r") as ry_file:
    data_y=json.load(ry_file)

i=0
#while(i!=len(tk1)):
#    print(tk1[i],data_x[i],data_y[i])
#    print("\n")
#    i=i+1
plt.scatter(data_x,data_y)
#for i in range(len(data_x)):
#    plt.text(data_x[i],data_y[i],tk1[i])


# %%
