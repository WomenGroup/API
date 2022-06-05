from bs4 import BeautifulSoup
import requests

url = 'https://www.devmedia.com.br/cursos'

valor = 'Pago'
modo = 'Online'
conclusao = 'Sem Limite'
linhas_csv = []
html = requests.get(url).content
soup = BeautifulSoup(html, 'html.parser')
div_cursos = soup.find_all('div',class_='curso-wrapper')

for div_curso in div_cursos:
    href = div_curso.find('a',class_='curso-buton-start').get('href')
    html_curso = requests.get('https:'+href).content
    soup_curso = BeautifulSoup(html_curso,'html.parser')
    titulo = soup_curso.find('h1').get_text()
    carga_horaria = soup_curso.find('div',class_='carga-horaria-curso-destaque').find('span').get_text().strip()
    dados = titulo+';'+href+';'+valor+';'+modo+';'+carga_horaria+';'+conclusao
    linhas_csv.append (dados)

url = 'https://www.sebrae.com.br/sites/render/component?vgnextcomponentid=3263d864e639a610VgnVCM1000004c00210aRCRD&qtd={}&order=0&filters=&_=1653492777753'

for qtd in range(0, 61, 12):
    url2 = url.format( qtd)
    html = requests.get(url2).content
    soup = BeautifulSoup(html, 'html.parser')
    lista = []
    div_titulos = soup.find_all('div', class_='sb-components__card__info__title')
    div_descricao = soup.find_all('div', class_='sb-components__card__info__details')

    
    for indice in range(len(div_titulos)):
        titulo_card = div_titulos[indice].get_text().strip()
        href = div_titulos[indice].find('a').get('href')
        lista_descricoes = div_descricao[indice].get_text().strip().split('\n')
        lista_sem_vazio = []
        for descricao in lista_descricoes:
            if len(descricao) != 0:
                lista_sem_vazio.append(descricao)
        descricoes_card = ';'.join(lista_sem_vazio)
        dados = titulo_card+';'+'https://www.sebrae.com.br'+href+';'+descricoes_card
        linhas_csv.append (dados)

with open ('csv_sebrae.csv', 'w',encoding="utf-8") as csv:
    csv.write('título;link;valor;modo;duração;conclusão\n')
    csv.write('\n'.join(linhas_csv))

