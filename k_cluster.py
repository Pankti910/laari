#%%
import numpy as np
import matplotlib.pyplot as plt

with open("token_data_x.json","r") as rx_file:
    arrx=json.load(rx_file)

with open("token_data_y.json","r") as ry_file:
    arry=json.load(ry_file)
#rnge=np.array([0.0,0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9])

arrx=np.array(arrx)
arry=np.array(arry)

plt.scatter(arrx,arry)

a1=np.array([[0.3]])
a2=np.array([[0.5]])
b1=np.array([[0.8]])
b2=np.array([[0.7]])
c1=np.array([[0.5]])
c2=np.array([[0.2]])

plt.scatter(a1,a2,color="red")#green
plt.scatter(b1,b2,color="yellow")#orange
plt.scatter(c1,c2,color="blue")#black
plt.show()

black_x=[]
black_y=[]
green_x=[]
green_y=[]
orange_x=[]
orange_y=[]

for i in range(len(arrx)):
    dist_green=((a1-arrx[i])**2)-((a2-arry[i])**2)
    dist_orange=((b1-arrx[i])**2)-((b2-arry[i])**2)
    dist_black=((c1-arrx[i])**2)-((c2-arry[i])**2)
    
    d_g=dist_green**2
    d_o=dist_orange**2
    d_b=dist_black**2
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
            
plt.scatter(green_x,green_y,color="green")
plt.scatter(orange_x,orange_y,color="orange")
plt.scatter(black_x,black_y,color="black")

plt.scatter(a1,a2,color="green")
plt.scatter(b1,b2,color="orange")
plt.scatter(c1,c2,color="black")

plt.show()

# %%
