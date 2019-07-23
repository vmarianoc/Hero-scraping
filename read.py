# -*- coding: utf-8 -*-
import numpy as np
import pandas as pd

#Lendo o arquivo CSV
filename = 'herois.csv'
filename2 = 'superpoderes.csv'
db1 = pd.read_csv(filename)
db2 = pd.read_csv(filename2)

#print(db1.describe())
#print(db2.describe())

#filtros
#dados = db2[db2['Agility'].isin['True']]
print(db2[db2['Agility'].isin(['True'])])
#retornando linhas

#Se vier um número vazio uma ideia é usar o nan
#db1.loc[9,[nome da coluna]] = np.nan

#Para adicionar novos campos
#db1['nome do campo'] = (o que haverá nele)


