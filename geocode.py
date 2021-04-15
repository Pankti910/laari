from geopy.geocoders import Nominatim

f=open("address.txt","r")
s=f.read()
print(type(s))
geo_locate=Nominatim(user_agent="my-application")

location=geo_locate.geocode(s)

print(location.latitude)
print(location.longitude)