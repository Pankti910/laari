import numpy
import json

tk=["manchurian","manchurian","panipuri","sevpuri","panipuri","panipuri"]

with open("search.json","r") as read_f:
    tokens=json.load(read_f)

print(tokens)

def softmax(x):
    e=numpy.exp(x-max(x))
    return e/numpy.sum(e)

i=0 #for tk
k=0 #for single_names
single_names=[]
single_counts=[]
while i!=len(tk):
    f=1 #flag for already counted token
    k=0
    while k !=len(single_names):
        if  single_names[k]==tk[i]:
            f=0
        k=k+1
    
    if f == 1 or i == 0:
        l=0 #for iterating tk again
        cnt=0 #for counting iterations
        single_names.append(tk[i])
        print(single_names)
        while l != len(tk):
            if(tk[i] == tk[l]):
                cnt=cnt+1
            l=l+1
        single_counts.append(cnt)
    i=i+1

numpy_single_counts=numpy.array((single_counts))
print(softmax(numpy_single_counts))

softmax_numpy_single_counts=[]
softmax_numpy_single_counts=softmax(numpy_single_counts)


#top 2 searched trending

softmax_trending=softmax_numpy_single_counts #copying array to slice it down

descend_trending=-numpy.sort(-softmax_trending) #sorting in descending

trending=descend_trending[0:2]
print(trending)
i=0
trending_names=[]
while i != len(trending):
    k=0
    while k != len(softmax_numpy_single_counts):
        if trending[i] == softmax_numpy_single_counts[k]:
            trending_names.append(single_names[k])
        k=k+1
    i=i+1

print(trending_names)

with open("trending.json","w") as w_file:
    json.dump(trending_names,w_file) 