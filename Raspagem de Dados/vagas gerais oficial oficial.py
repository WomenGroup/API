from bs4 import BeautifulSoup

import requests

url = 'https://www.bne.com.br/vagas-de-emprego/?Page='
headers = {
    'User-Agent': "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36"}

site = requests.get(url, headers=headers)
soup = BeautifulSoup(site.content, 'html.parser')
placas = soup.find_all('div', class_='job')


for i in range(1,int(65)):
    url_pag = f'https://www.bne.com.br/vagas-de-emprego/?Page={i}'
    site = requests.get(url_pag, headers=headers)
    soup = BeautifulSoup(site.content, 'html.parser')
    placas = soup.find_all('div', class_='job')

    with open ('31geral.csv','a',newline='', encoding='utf-8') as f:
        
        for placa in placas:
            
            link = placa.find("a", class_="JobListLink linkDesktop").get('href')
           
            cargo = placa.find("a", class_="linkDesktop is-link").get_text().strip()

            detalhe = placa.find_all("dl", class_= "job__detail")

            detalhes = placa.find_all("dd")
            if "Confidencial" in detalhes[2].get_text():
                det2 = "Confidencial"
            else:
                det2 = detalhes[2].get_text()
            if len(detalhes) == 4:
                if "Confidencial" in detalhes[3].get_text():
                    det3 = "Confidencial"
                else:
                    det3 = detalhes[3].get_text()
                    linha = cargo + ';' + detalhes[0].get_text() + detalhes[1].get_text() + ';' + detalhes[2].get_text() + ':' + det3 + ';' + 'https://www.bne.com.br' + link + '\n'
            else:
                linha = cargo + ';' + detalhes[0].get_text() + ';' + detalhes[1].get_text() + ';' + det2 + ';' + 'https://www.bne.com.br' + link + '\n'



          

            print(linha)
            f.write(linha)
