import numpy
import json
import os

with open("user1.json","r") as r_user:
    user=json.load(r_user)

with open("Test_corpus.json","r") as r_corpus:
    corpus=json.load(r_corpus)

n=len(user)+len(corpus)

data_x=numpy.random.random((1,n))
data_y=numpy.random.random((1,n))
x_vals=list(data_x[0])
y_vals=list(data_y[0])
with open("token_data_x.json","w") as w_file:
    json.dump(x_vals,w_file)

with open("token_data_y.json","w") as w_file:
    json.dump(y_vals,w_file)