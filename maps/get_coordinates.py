import gspread

from oauth2client.service_account import ServiceAccountCredentials

scope=['https://spreadsheets.google.com/feeds',
         'https://www.googleapis.com/auth/drive']

creds=ServiceAccountCredentials.from_json_keyfile_name('project17-303ce1ff78e2.json',scope)

client=gspread.authorize(creds)

sheet=client.open('coordinates').sheet1

co=sheet.find("Inox DR World Multiplex Cinema, Aai Mata Chowk, Aai Mata Road, Amidhara Society, Bhagyoday Industrial Estate, Parvat Patiya, Surat, Gujarat")

r=co.row
c=co.col
print(sheet.cell(r,c+1).value)
print(sheet.cell(r,c+2).value)


