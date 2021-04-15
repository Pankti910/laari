#SETS DATA X AND Y WHILE WRITING X AND Y FOR WHOLE CORPUS
import json
import numpy
import json
import nltk
from nltk.tokenize import word_tokenize 
from nltk.corpus import stopwords
from matplotlib import pyplot as plt

common_ts=["The","These","Their","Thought","Though","This","That"]

#with open("user1.json","r") as read_f:
#    user_data=json.load(read_f)
    #user_searched Corpus

with open("Test_corpus.json","r") as read_f:
    corpus_data=json.load(read_f)
    #database and keywords corpus

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

tk=[]
#input as [words]
#tokenizing
while i<(len(words2)):
    #print(data[i])
    sample_tk1=word_tokenize(words2[i])
    for word1 in sample_tk1:
        if word1 not in stopwords.words():
            tk.append(word1)     
    i=i+1
#tokenizing
#final output [tk]


#removing common_ts
while j != (len(tk)):
    for w_t in common_ts:
        if tk[j]==w_t:
            tk.remove(tk[j])
    j=j+1
#removing common_ts


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
#TOKENIZED CORPUS_DATA

##################################################################33333

#non-tokenized Array
#words=[]
#words=user_data['Array']
#non-tokenized Array

#flags for tokenizing
#i=0
#j=0
#l=0
#k=0
#flags for tokenizng

#tk=[]
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



#All tokens
#main_tk=[]
#main_tk=tk1+tk
#All tokens
print(tk)

#writing data[] inside data_x.json and data_y.json
data_y=[]
for i in range(len(tk)):
    data_y.append(0.0)

data_x=numpy.random.random((1,len(tk)))
x_vals=list(data_x[0])
y_vals=list(data_y)

with open("token_trend_x.json","w") as w_file:
    json.dump(x_vals,w_file)

with open("token_trend_y.json","w") as w_file:
    json.dump(y_vals,w_file)
