import numpy as np
import json
import pickle
#assigning weights & biases
w1=np.random.random((2,3))
w2=np.random.random((3,2))
b=np.random.random()
#assigning weights & biases

wb=[]
wb.append(w1)
wb.append(w2)
wb.append(b)

filename="weight_bias_trend"
outfile=open(filename,"wb")
pickle.dump(wb,outfile)
outfile.close()

infile=open("weight_bias_trend","rb")
file=pickle.load(infile)
print(file)
infile.close()