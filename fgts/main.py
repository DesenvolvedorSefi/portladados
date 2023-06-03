import pandas as pd
import mysql.connector

# leitura do arquivo Excel
df = pd.read_excel("fgts1.xlsx")

# substituir valores nulos ou vazios por 0
df = df.fillna(value=0)

# conexão com o banco de dados
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  database="portaldados"
)

mycursor = mydb.cursor()

# inserir dados na tabela
for row in df.itertuples(index=False):
    sql = "INSERT INTO fgts (CPF2, endereco, numero, complemento, bairro, cep, cidade, uf, nome, sexo, nasc, nome_mae, cbo, saldo, cnpj, cnae, pis, movel1, movel2, movel3, fixo1, fixo2, fixo3, email1) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
    val = row
    mycursor.execute(sql, val)

mydb.commit()

print(mycursor.rowcount, "registros inseridos com sucesso!")
