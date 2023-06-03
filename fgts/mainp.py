import pandas as pd
import mysql.connector

# leitura do arquivo Excel
df = pd.read_excel("prefeituras.xlsx")

# excluir linhas completamente vazias
df = df.dropna(how='all')

# substituir valores nulos ou vazios por "None"
df = df.fillna(value=0)


# conexão com o banco de dados
mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    database="portaldados"
)

mycursor = mydb.cursor()

# inserir dados na tabela
for i, row in enumerate(df.itertuples(index=False), start=1):
    sql = "INSERT INTO `prefeituras` (`CPF`, `DDD`, `TEL`, `DDD2`, `TEL2`, `DDDCEL`, `CEL`, `CELOP`, `NOME_A`, `TIPO`, `LOGR`, `NUM`, `COMPL`, `BAIRRO`, `CEP`, `CIDADE`, `UF`, `TP`, `EMAIL`, `CNPJ`, `SEXO`, `NASC`, `ESCO`, `NAC`, `CBO`, `ADMISSAO`, `DESLIG`, `SALCONT`, `CNAE`, `CNAE2`, `NJ`, `SALDEZ`, `VINC`, `ID`, `NOME_B`, `CONTATOS_ID`, `ddd3`, `telefone3`, `ddd4`, `telefone4`, `TIPO_TELEFONE`, `rn`)  VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);"
    val = row[:43] # utilizar somente as 43 primeiras colunas do arquivo Excel
    print("Processando linha", i, ":", val)
    try:
        mycursor.execute(sql, val)
        mydb.commit()
        print("Inserção bem sucedida.")
    except Exception as e:
        print("Erro ao processar linha", i, ":", e)
        mydb.rollback()

print(mycursor.rowcount, "registros inseridos com sucesso!")
